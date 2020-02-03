<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('control::pages.user.index');
    }

    public function show(User $user)
    {
        return view('control::pages.user.show')->with('user', $user);
    }

}
