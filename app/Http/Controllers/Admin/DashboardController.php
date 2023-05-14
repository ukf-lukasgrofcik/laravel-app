<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{

    public function index() : View | Application | Factory
    {
        return view('admin.dashboard.index');
    }

}
