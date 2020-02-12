<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\GroupTag;

class GroupTagController extends Controller
{

    public function index()
    {
        return view('control::pages.tag.group.index');
    }

    public function show(GroupTag $group)
    {
        return view('control::pages.tag.group.show')->with('groupTag', $group);
    }

}
