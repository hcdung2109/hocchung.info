<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->get()->groupBy('table_name');

        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Create Category
     * @param PermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        try {

            $table_name = $request->input('table_name');
            $display_name = $request->input('display_name');
            $description = $request->input('description');

            if ($request->input('is_crud')) {

                //Insert or update permissions CRUD to table
                $this->addCRUD($table_name);
            }

            //Insert or update news permissions to table
            if ($request->input('display_name') && $request->input('description')) {

                $this->permission->updateOrCreate([
                    'table_name' => $table_name,
                    'display_name' => $display_name,
                    'description' => $description
                ]);
            }

        } catch (\PDOException $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());

        }

        return redirect('admin/permission')->with('msgSuccess', 'Success !');
    }

    /**
     * Show
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Edit
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $property = $request->only(['display_name', 'description','table_name']);

        // try update
        try {
            $permission->update($property);
        } catch(\PDOException $exception) {
            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/permission')->with('msgSuccess',__('admin.update_success'));
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        Permission::destroy($id);
    }

    /**
     * Insert or update permissions
     * @param $tab_name string
     */
    public function addCRUD($tab_name)
    {
        $singular_table = str_singular($tab_name);

        $data = [
            [ 'table_name' => $tab_name, 'name' => 'create-'.$singular_table, 'display_name' =>  'Create '.$singular_table , 'description' => 'Thêm '.$singular_table],
            [ 'table_name' => $tab_name, 'name' => 'edit-'.$singular_table, 'display_name' =>  'Edit '.$singular_table , 'description' => 'Sửa '.$singular_table],
            [ 'table_name' => $tab_name, 'name' => 'destroy-'.$singular_table, 'display_name' =>  'Destroy '.$singular_table , 'description' => 'Xóa '.$singular_table],
            [ 'table_name' => $tab_name, 'name' => 'browse-'.$singular_table, 'display_name' =>  'Browse '.$singular_table , 'description' => 'Hiển thị danh sách '.$singular_table],
            [ 'table_name' => $tab_name, 'name' => 'show-'.$singular_table, 'display_name' =>  'Show '.$singular_table , 'description' => 'Hiển thị chi tiết một  '.$singular_table],
        ];

        foreach ($data as $row) {
            $this->permission->updateOrCreate($row);
        }
    }


}
