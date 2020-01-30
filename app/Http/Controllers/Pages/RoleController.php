<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return view('control::pages.role.index');
    }

    public function show(Role $role)
    {
        return view('control::pages.role.show')->with('role', $role);
    }

}
