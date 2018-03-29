<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TutorialRequest;
use App\Models\Category;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function __construct(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;

        $categories = Category::all();
        view()->share(compact('categories'));
    }


    /**
     * list tutorials
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tutorials = Tutorial::all();

        return view('admin.tutorial.index',compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutorial.create');
    }

    /**
     * Form add
     * @param TutorialRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TutorialRequest $request)
    {

        try {

            $this->tutorial->firstOrCreate($request->only('name','category_id','is_active'));

        } catch (Exception $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/tutorial')->with('msgSuccess', __('admin.finished'));
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

    /** Form edit
     * @param Tutorial $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tutorial $tutorial)
    {

        return view('admin.tutorial.edit',compact('tutorial'));
    }

    /**
     * Update
     * @param TutorialRequest $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TutorialRequest $request,Tutorial $tutorial)
    {
        try {

            $tutorial->update($request->only(['name','category_id','is_active']));

        } catch (Exception  $e) {
            return redirect()->back()->with('msgError', $e->getMessage());
        }

        return redirect('admin/tutorial')->with('msgSuccess', __('admin.finished'));
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        Tutorial::destroy($id);
    }

}
