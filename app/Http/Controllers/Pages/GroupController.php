<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Group;

class GroupController extends Controller
{

    public function index()
    {
        return view('control::pages.group.index');
    }

    public function show(Group $group)
    {
        return view('control::pages.group.show')->with('group', $group);
    }

}
