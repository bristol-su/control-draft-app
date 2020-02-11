<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\RoleTagCategory;

class RoleTagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.role.index');
    }

    public function show(RoleTagCategory $role)
    {
        return view('control::pages.tag-category.role.show')->with('roleTagCategory', $role);
    }

}
