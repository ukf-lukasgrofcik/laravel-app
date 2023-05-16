<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{

    public function index() : View | Application | Factory
    {
        $articles = Article::paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    public function create() : View | Application | Factory
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articles.create', compact('categories', 'tags'));
    }

    public function store(CreateArticleRequest $request) : RedirectResponse
    {
        $article = Article::create($request->only([ 'name', 'content', 'published', 'category_id' ]));

        $article->tags()->attach($request->tags);

        session()->flash('alert', 'success');
        session()->flash('message', "Article <b>$article->name</b> has been created.");

        return redirect()->route('articles.index');
    }

    public function edit(Article $article) : View | Application | Factory
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(UpdateArticleRequest $request, Article $article) : RedirectResponse
    {
        $article->update($request->only([ 'name', 'content', 'published', 'category_id' ]));

        $article->tags()->sync($request->tags);

        session()->flash('alert', 'success');
        session()->flash('message', "Article <b>$article->name</b> has been edited.");

        return back();
    }

    public function destroy(Article $article) : RedirectResponse
    {
        $article->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Article <b>$article->name</b> has been deleted.");

        return back();
    }

}
