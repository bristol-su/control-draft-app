<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\GroupTagCategory;

class TagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.index');
    }

    public function showGroup(GroupTagCategory $group)
    {
        return view('control::pages.tag-category.show')->with('tagCategory', $group)->with('tagType', 'group');
    }

}
