<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category = $category;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->orderBy('parent_id')->get();

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = $this->category->getListCategory();
        return view('admin.category.create', compact('listCategory'));
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->only(['name', 'alias', 'position', 'parent_id','image']);
        try {

            $this->category->create($attributes);

        } catch (\PDOException $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/category')->with('msgSuccess', __('admin.finished'));
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.category.edit',compact('category','categories'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $attrs = $request->all();

        if ($request->hasFile('other_image')) {
            // delete file old image
            @Storage::delete($category->getOriginal('image'));

            // set image
            $file_name = $request->file('other_image')->getClientOriginalName();
            $file_name = time().'-'.$file_name;
            $path = $request->file('other_image')->storeAs(PATH_UPLOAD, $file_name);
            // set image
            $attrs['image'] = $path;
        }

        $category->update($attrs);

        return redirect()->route('admin.category.edit',$category)->with('msgSuccess', __('admin.updated'));
    }

    /**
     * Destroy a category
     * @param $id
     */
    public function destroy($id)
    {
        Category::destroy($id);
    }

    public function changeStatus(Category $category)
    {
        $category->status == STATUS_ACTIVE ? STATUS_DEACTIVE : STATUS_ACTIVE;

        $category->update();

    }


}
