<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangeProfileRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{

    public function profile() : View | Application | Factory
    {
        return view('admin.settings.profile');
    }

    public function profile_submit(ChangeProfileRequest $request) : RedirectResponse
    {
        $user = auth()->user();

        $user->update( $request->only([ 'name', 'surname' ]) );

        session()->flash('alert', 'success');
        session()->flash('message', "Your profile data has been changed.");

        return redirect()->route('settings.profile');
    }

    public function password() : View | Application | Factory
    {
        return view('admin.settings.password');
    }

    public function password_submit(ChangePasswordRequest $request) : RedirectResponse
    {
        $user = auth()->user();

        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('alert', 'success');
        session()->flash('message', "Your password has been changed.");

        return redirect()->route('settings.password');
    }

}
