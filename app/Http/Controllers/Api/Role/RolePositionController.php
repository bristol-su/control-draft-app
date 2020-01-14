<?php


namespace App\Http\Controllers\Api\Role;


use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Role;

class RolePositionController extends Controller
{

    public function index(Role $role)
    {
        return $role->position();
    }

}
