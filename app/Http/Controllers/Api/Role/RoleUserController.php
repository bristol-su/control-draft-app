<?php


namespace App\Http\Controllers\Api\Role;


use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\User;

class RoleUserController extends Controller
{

    public function index(Role $role)
    {
        return $role->users();
    }

    public function update(Role $role, User $user)
    {
        $role->addUser($user);
    }

    public function destroy(Role $role, User $user)
    {
        $role->removeUser($user);
    }

}
