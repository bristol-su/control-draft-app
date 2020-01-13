<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\Controller;

class GroupController extends Controller
{

    public function index()
    {
        return view('control::pages.group.index');
    }

}
