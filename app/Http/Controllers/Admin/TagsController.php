<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TagsController extends Controller
{

    public function index() : View | Application | Factory
    {
        $tags = Tag::withCount('articles')->paginate(10);

        return view('admin.tags.index', compact('tags'));
    }

    public function create() : View | Application | Factory
    {
        return view('admin.tags.create');
    }

    public function store(CreateTagRequest $request) : RedirectResponse
    {
        $tag = Tag::create($request->only([ 'name', 'description' ]));

        session()->flash('alert', 'success');
        session()->flash('message', "Tag <b>$tag->name</b> has been created.");

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag) : View | Application | Factory
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag) : RedirectResponse
    {
        $tag->update($request->only([ 'name', 'description' ]));

        session()->flash('alert', 'success');
        session()->flash('message', "Tag <b>$tag->name</b> has been edited.");

        return back();
    }

    public function destroy(Tag $tag) : RedirectResponse
    {
        $tag->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Tag <b>$tag->name</b> has been deleted.");

        return back();
    }

}
