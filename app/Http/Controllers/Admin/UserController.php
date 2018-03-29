<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store use
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $property =  $request->only(['name', 'email','is_active','role_id']);
        $property['password'] = bcrypt($request->password);

        try {
            $new_user = $this->user->create($property);
            // attach role
            $new_user->attachRoles($property['role_id']);

        } catch (\PDOException $exception) {
            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/user')->with('msgSuccess', __('admin.finished'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show form edit user
     * by hcdung 25-2
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update user and entycpt password
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $property =  $request->only(['name', 'email','is_active','role_id']);

        if ($request->has('new_password')) {
            $property['password'] = bcrypt($request->new_password);
        }

        try {

            $user->update($property);

            // attach role
            $user->roles()->sync($property['role_id']);

        } catch (\PDOException $exception) {
            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/user')->with('msgSuccess', __('admin.finished'));
    }

    /**
     * Delete user
     * @param User $user
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
