<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RoleController extends Controller
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role->getListRole();

        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Create
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $property =  $request->all();

        try {

            $this->role->create($property);

        } catch (\PDOException $exception) {
            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/role');
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
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $roles = $this->role->getListRole();

        return view('admin.role.edit',compact('roles','role'));
    }

    /**
     * Update
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $property =  $request->only(['name', 'display_name', 'description']);

        try{

            $role->update($property);

        }catch(\PDOException $exception){
            return redirect()->back()->with('errorMsg', $exception->getMessage());
        }

        return redirect('admin/role')->with('successMsg', 'Success !');
    }

    /**
     * Delete role and delete relationship user and permission
     * @param Role $role
     */
    public function destroy(Role $role)
    {
        // xóa liên tục cùng các dữ liệu có quan hệ
        $role->delete(); // Điều này sẽ làm việc không có vấn đề gì

// Băt buộc Delete
        $role->users()->sync([]); // Xóa dữ liệu con có quan hệ của users
        $role->perms()->sync([]); // xóa dữ liệu con có quan hệ của perms

        $role->forceDelete(); // bắt buộc xóa bất kể các có cascading delete không cho phép xóa. "cascading delete" yêu cầu xóa các dữ liệu liên quan trước khi xóa bản ghi."
    }

    /**
     * Form attach permissions
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function attachPerms(Role $role)
    {
        $permissions = Permission::get()->groupBy('table_name');

        return view('admin.role.attach-perms',compact('permissions','role'));
    }

    /**
     * Attach permission to specified role
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAttachPerms(Request $request, Role $role)
    {
        $arrayPermissions = $request->only('permissions');

        try{
            $role->perms()->sync($arrayPermissions['permissions']);
        }catch(\PDOException $exception){
            return redirect()->back()->with('msgError', $exception->getMessage());
        }
        return redirect()->back()->with('msgSuccess', __('admin.update_success'));
    }
}
