<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param null $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($tag = null)
    {
        $tags = Tag::all();

        return view('admin.tag.index',compact('tags','tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Update or create
     * @param TagRequest $request
     * @param null $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        try {

            $this->tag->create($request->only('name'));

        } catch (\PDOException $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('admin/tag')->with('msgSuccess', __('admin.finished'));
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
     * @param Tag $tag
     */
    public function edit(Tag $tag)
    {
        dd($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $tag = Tag::findOrFail($id);

            $tag->update(['name' => $request->old_name]);

        } catch (Exception  $e) {
            return redirect()->back()->with('msgError', $e->getMessage());
        }

        return redirect('admin/tag')->with('msgSuccess', __('admin.finished'));
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        $tag->articles()->detach();

    }
}
