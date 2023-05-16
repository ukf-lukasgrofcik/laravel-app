<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{

    public function index() : View | Application | Factory
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create() : View | Application | Factory
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request) : RedirectResponse
    {
        $user = User::create($request->only([ 'name', 'surname', 'email', 'role' ]));

        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('alert', 'success');
        session()->flash('message', "User <b>$user->fullname</b> has been created.");

        return redirect()->route('users.index');
    }

    public function edit(User $user) : View | Application | Factory
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) : RedirectResponse
    {
        $user->update($request->only([ 'role' ]));

        session()->flash('alert', 'success');
        session()->flash('message', "User <b>$user->fullname</b> has been edited.");

        return back();
    }

    public function destroy(User $user) : RedirectResponse
    {
        $user->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "User <b>$user->fullname</b> has been deleted.");

        return back();
    }

}
