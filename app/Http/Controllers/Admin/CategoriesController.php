<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategoriesController extends Controller
{

    public function index() : View | Application | Factory
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create() : View | Application | Factory
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request) : RedirectResponse
    {
        $category = Category::create($request->only([ 'name', 'description' ]));

        session()->flash('alert', 'success');
        session()->flash('message', "Category <b>$category->name</b> has been created.");

        return redirect()->route('categories.index');
    }

    public function edit(Category $category) : View | Application | Factory
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category) : RedirectResponse
    {
        $category->update($request->only([ 'name', 'description' ]));

        session()->flash('alert', 'success');
        session()->flash('message', "Category <b>$category->name</b> has been edited.");

        return back();
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Category <b>$category->name</b> has been deleted.");

        return back();
    }

}
