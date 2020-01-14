<?php


namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\User;

class UserGroupController extends Controller
{

    public function index(User $user)
    {
        return $user->groups();
    }

    public function update(User $user, Group $group)
    {
        $user->addGroup($group);
    }

    public function destroy(User $user, Group $group)
    {
        $user->removeGroup($group);
    }

}
