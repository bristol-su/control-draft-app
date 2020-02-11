<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\GroupTagCategory;

class GroupTagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.group.index');
    }

    public function show(GroupTagCategory $group)
    {
        return view('control::pages.tag-category.group.show')->with('groupTagCategory', $group);
    }

}
