<?php

namespace App\Http\Controllers\Pages\Tags;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\PositionTag;

class PositionTagController extends Controller
{

    public function index()
    {
        return view('control::pages.tag.position.index');
    }

    public function show(PositionTag $position)
    {
        return view('control::pages.tag.position.show')->with('positionTag', $position);
    }

}
