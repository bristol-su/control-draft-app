<?php

namespace App\Http\Controllers\Api\Group;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\User;

class GroupUserController extends Controller
{

    public function index(Group $group)
    {
        return $group->members();
    }

    public function update(Group $group, User $user)
    {
        $group->addUser($user);
    }

    public function destroy(Group $group, User $user)
    {
        $group->removeUser($user);
    }

}
