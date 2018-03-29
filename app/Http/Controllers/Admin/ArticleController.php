<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Tag;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct(Article $article)
    {
        $this->article = $article;

        $listCategory = Category::getListCategory();
        view()->share(compact('listCategory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get list articles
        $articles = Article::with('category')->latest()->paginate();

        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.article.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $attributes = $request->all();

        try {
            // upload image
            if ($request->hasFile('image')) {

                $attributes['image'] = $request->file('image')->store(PATH_UPLOAD);

            } else {
            // use available image of category
                if ($request->has('is_available')) {
                    $attributes['image'] = Category::find($request->category_id)->image;
                }
            }

            //create new
            $article = $this->article->create($attributes);

            // insert success
            if ($article) {

                // insert tag available
                if ($request->input('tag_id')) {
                    $article->tags()->sync($request->input('tag_id'));
                }

                // insert new tag
                if ($request->input('new_tag')) {
                    $tagNames = explode(',',strtolower($request->input('new_tag'))) ;
                    $tagIds = [];

                    foreach ($tagNames as $tagName) {
                        $tag = Tag::firstOrCreate(['name' => trim($tagName)]);

                        if ($tag) {
                            $tagIds[] = $tag->id;
                        }
                    }

                    $article->tags()->sync($tagIds);
                }

            }

        } catch (\PDOException $exception) {
            return redirect()->back()->withMsg( $exception->getMessage());
        }

        return redirect('admin/article')->withMsg(__('admin.finished'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.article.show');
    }

    /**
     * show the form for editing the specified resource.
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $tagIds = $article->tags->pluck('id')->all();
        $tutorials = Tutorial::where('category_id', $article->category_id)->get();

        return view('admin.article.edit',compact('article','tags','tagIds','tutorials'));
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return mixed
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $attributes = $request->all();

        // upload image
        if ($request->hasFile('other_image')) {
            // delete file old
            @Storage::delete($article->image);

            $attributes['image'] = $request->file('other_image')->store(PATH_UPLOAD);

        } else {
            // use available image of category
            if ($request->has('is_available')) {
                $attributes['image'] = Category::find($request->category_id)->image;
            }
        }

        $article->update($attributes);

        // insert and update tag
        if ($request->input('tag_id')) {
            $tagIds = $request->input('tag_id');
        } else {
            $tagIds = [];
        }

        // insert new tag
        if ($request->input('new_tag')) {
            $tagNames = explode(',',strtolower($request->input('new_tag'))) ;

            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);

                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }
        }

        $article->tags()->sync($tagIds);

        return redirect()->route('admin.article.edit',$article)->withMsg(__('admin.updated'));
    }

    /**
     * Delete
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        $article->tags()->detach();
    }

    /**
     * Change status of article
     * @param Category $category
     */
    public function changeStatus(Category $category)
    {
        $category->status == STATUS_ACTIVE ? STATUS_DEACTIVE : STATUS_ACTIVE;

        $category->update();

    }

    public function loadTutorials($category_id)
    {
        return Tutorial::select('id','name')->where('category_id', $category_id)->get()->toJson();
    }
}
