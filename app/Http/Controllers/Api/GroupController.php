<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Repositories\Group as GroupRepository;
use BristolSU\ControlDB\Models\Group;

class GroupController extends Controller
{

    public function index(GroupRepository $groupRepository)
    {
        return $groupRepository->all();
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy(GroupRepository $groupRepository)
    {

    }

}
