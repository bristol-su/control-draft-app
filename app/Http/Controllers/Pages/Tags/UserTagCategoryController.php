<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\UserTagCategory;

class UserTagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.user.index');
    }

    public function show(UserTagCategory $user)
    {
        return view('control::pages.tag-category.user.show')->with('userTagCategory', $user);
    }

}
