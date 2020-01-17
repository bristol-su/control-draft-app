<?php


namespace App\Http\Controllers\Api\Position;


use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\Position;

class PositionRoleController extends Controller
{

    public function index(Position $position)
    {
        return $position->roles();
    }

}
