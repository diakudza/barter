<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Profile\UpdateRequest;
use App\Http\Requests\User\Profile\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            if (Auth::user()->status_id == 2) {
                Auth::logout();
                return redirect()->route('home')
                    ->with('fail', 'Данный пользователь не может войти в системы, так-как был заблокирован!');
            }

            return redirect()->route('searchPage')->with(['success' => 'Привет, Вы успешно вошли в систему!']);
        }
        return redirect()->to(route('loginPage'))->with(['fail' => 'Неверная пара логин\пароль!']);
    }

    public function registration(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        return redirect()->route('user.profile')->with('success', "User $request->input('name') was registered!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home()->with(['success' => 'Вы вышли!']);;
    }

    public function updateUserData(UpdateRequest $request, User $user)
    {
        $user = User::where($request->safe()->only(['id']))->get()->first();
        $validated = $request->safe()->only(['name', 'email', 'phone']);
        $user = $user->fill($validated);
        if ($user->save()) {
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
}
