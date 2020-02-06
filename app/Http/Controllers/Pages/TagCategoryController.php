<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\GroupTag;

class TagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.index');
    }

    public function showGroup(GroupTag $groupTag)
    {
        return view('control::pages.tag-category.show-group')->with('groupTag', $groupTag);
    }

}
