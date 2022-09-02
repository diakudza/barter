<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use App\Queries\QueryBuilderUsers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, UserRole $roles, UserStatus $statuses, Request $request, QueryBuilderUsers $usersList)
    {
        $status = $request->input('status');
        $role = $request->input('role');
        $searchUser = $request->input('user');
        $users = $usersList->getAdminUsersByFilter($user, $status, $role, $searchUser);
        // $users = $user
        //     ->when($searchUser, function ($query, $searchUser) {
        //         $query
        //             ->where('email', 'like', '%' . $searchUser . '%')
        //             ->orWhere('name', 'like', '%' . $searchUser . '%');
        //     })
        //     ->when($status, function ($query, $status) {
        //         $query->whereIn('status_id', $status);
        //     })
        //     ->when($role, function ($query, $role) {
        //         $query->whereIn('role_id', $role);
        //     })
        //     ->paginate(20)
        //     ->withQueryString();
        return view('Admin.Users', [
            'users' => $users,
            'roles' => $roles->all(),
            'statuses' => $statuses->all(),
            'filterStatuses' => $status,
            'filterRoles' => $role,
            'searchString' => $searchUser,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserRole $roles)
    {
        return view('Admin.User', [
            'user' => $user,
            'roles' => $roles->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return redirect()->back()->with('success', "Обновил права");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
        return redirect()->back()->with('success', 'Пользователь удален!');
    }
}
