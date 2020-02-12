<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\RoleTag;

class RoleTagController extends Controller
{

    public function index()
    {
        return view('control::pages.tag.role.index');
    }

    public function show(RoleTag $role)
    {
        return view('control::pages.tag.role.show')->with('roleTag', $role);
    }

}
