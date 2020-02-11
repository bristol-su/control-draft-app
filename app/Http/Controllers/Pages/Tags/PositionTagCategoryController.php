<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\PositionTagCategory;

class PositionTagCategoryController extends Controller
{

    public function index()
    {
        return view('control::pages.tag-category.position.index');
    }

    public function show(PositionTagCategory $position)
    {
        return view('control::pages.tag-category.position.show')->with('positionTagCategory', $position);
    }

}
