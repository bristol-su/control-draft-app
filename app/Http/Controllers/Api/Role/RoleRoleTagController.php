<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\RoleTag;
use BristolSU\ControlDB\Contracts\Models\Role;

class RoleRoleTagController extends Controller
{

    public function index(Role $role)
    {
        return $role->tags();
    }

    public function update(Role $role, RoleTag $roleTag)
    {
        return $role->addTag($roleTag);
    }

    public function destroy(Role $role, RoleTag $roleTag)
    {
        $role->removeTag($roleTag);
    }

}
