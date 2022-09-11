<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Profile\UpdateRequest;
use App\Http\Requests\User\Profile\UpdatePasswordRequest;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateRatingRequest;
use App\Models\User;
use App\Queries\QueryBuilderUsers;
use App\Services\ImageService;
use App\Services\RatingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();


            $user->update(['login_time' => now(), 'ip' => $request->ip(), 'online' => 1]);
            if (app()->isDownForMaintenance() && in_array(Auth::user()->getRole(), ['admin', 'developer'])) {
                return redirect()->route('adminmain');
            }
            if (Auth::user()->status_id == 2) {
                $user->update(['logout_time' => now(), 'online' => 0]);
                Auth::logout();
                return redirect()->route('home')
                    ->with('fail', 'Данный пользователь не может войти в системы, так-как был заблокирован!');
            }
            return redirect()->route('home')->with(['success' => 'Привет, Вы успешно вошли в систему!']);
        }
        return redirect()->to(route('loginPage'))->with(['fail' => 'Не верная пара логин\пароль!']);
    }

    public function registration(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('success', "Пользователь ". $request->input('name') . " зарегистрирован!");
    }

    public function logout(Request $request, User $user)
    {
        $user = Auth::user();
        $user->update(['logout_time' => now(), 'online' => 0]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home()->with(['success' => 'Вы вышли!']);;
    }

    public function updateUserData(UpdateRequest $request, User $user, ImageService $imageService, QueryBuilderUsers $userDetail)
    {
        $user = $userDetail->getItemDetailById($request->safe()->only(['id'])['id'])->first();
        $validated = $request->safe()->only(['name', 'email', 'phone']);
        $removeImage = $request->safe()->only(['removeImage']);
        if ($removeImage) {
            $imageService->removeUserImage($user->id);
        }
        if ($request->hasFile('image')) {
            $imageService->removeUserImage($user->id);
            $image = $imageService->saveExistingUserImage($user->id, $request->file('image'));
        }
        $user = $user->fill($validated);
        if ($user->update()) {
            if (isset($image)) {
                $user->images()->save($image);
            }
            return redirect()->route('user.profile')->with('success', 'Данные профиля успешно обновлены');
        } else {
            return back()->with('fail', 'Ошибка обновления данных профиля!');
        }
    }

    public function updateUserPassword(UpdatePasswordRequest $request, User $user)
    {
        $user = User::where($request->safe()->only(['id']))->get()->first();
        $newPassword = Hash::make($request->safe()->only('newPassword')['newPassword']);
        $user = $user->fill(['password' => $newPassword]);
        if ($user->save()) {
            return redirect()->route('user.profile')->with('success', 'Пароль успешно обновлен');
        } else {
            return back()->with('fail', 'Ошибка обновления пароля!');
        }
    }

    public function updateUserRating(UpdateRatingRequest $request, User $user, RatingService $ratingService)
    {
        $user = $ratingService->updateUserRating(
            $request->safe()->only(['voted_id'])['voted_id'],
            $request->safe()->only(['voter_id'])['voter_id'],
            $request->safe()->only(['rating'])['rating'],
            $request->safe()->only(['text'])['text'],
        );
        if ($user->save()) {
            return redirect()->route(
                'user.public',
                ['id' => $request->safe()->only(['voted_id'])['voted_id']]
            )->with('success', 'Ваша оценка учтена!');
        } else {
            return back()->with('fail', 'Ошибка выставления оценки!');
        }
    }
}
