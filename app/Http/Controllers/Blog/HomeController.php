<?php

namespace App\Http\Controllers\Blog;

use App\Models\Tag;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
    public function __construct()
    {
        // get list all category to create menu
        $categories = Category::all();
        $tags = Tag::all();

        view()->share(compact('categories','tags'));
    }

    /**
     * Default blog home
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
         $categories = Category::all();

         $articles = [];
         foreach ($categories as $key => $cate) {
            $articles[$key] = Article::getArticles(['category_id' => $cate->id], $limit = 5);
         }

        return view('blog.index', compact('categories','articles'));
    }

    public function contact()
    {

    }

    /**
     * Get list article by category
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticlesOfCategory(Category $category)
    {
        $articles = $category->articles()->latest()->paginate(15);
        $tutorials = Tutorial::where('category_id', $category->id)->get();

        return view('blog.articles-of-category', compact('category','articles','tutorials'));
    }


    /**
     * Get list article by Tag
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticlesOfTag(Tag $tag)
    {
        $articles = $tag->articles()->paginate(15);

        return view('blog.articles-of-tag', compact('tag','articles'));
    }

    /**
     * Detail article
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticle(Article $article)
    {
        $relatedArticles = Article::getRelatedArticles($article->id, $article->category_id);

        if ($article->tutorial_id != 0) {
            $articlesOfTutorial = Article::getArticlesOfTutorial($article->id, $article->tutorial_id);
        }

        if ($article->category_id != 0) {
            $tutorials = Tutorial::where('category_id', $article->category_id)->get();
        }

        return view('blog.article', compact('article','relatedArticles','articlesOfTutorial', 'tutorials'));
    }

    public function tutorial(Tutorial $tutorial)
    {
        $articles = Article::getAllArticlesOfTutorial($tutorial->id);

        return view('blog.articles-of-tutorial', compact('articles','tutorial'));
    }


}
