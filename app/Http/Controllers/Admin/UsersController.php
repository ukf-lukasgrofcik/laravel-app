<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class UsersController extends Controller
{

    public function index() : View | Application | Factory
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

}
