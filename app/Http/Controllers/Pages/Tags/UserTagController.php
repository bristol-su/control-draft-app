<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\UserTag;

class UserTagController extends Controller
{

    public function index()
    {
        return view('control::pages.tag.user.index');
    }

    public function show(UserTag $user)
    {
        return view('control::pages.tag.user.show')->with('userTag', $user);
    }

}
