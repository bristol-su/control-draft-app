<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Position;

class PositionController extends Controller
{

    public function index()
    {
        return view('control::pages.position.index');
    }

    public function show(Position $position)
    {
        return view('control::pages.position.show')->with('position', $position);
    }

}
