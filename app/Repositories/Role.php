<?php


namespace App\Repositories;


use App\Models\Group as GroupModel;
use App\Models\Position as PositionModel;
use App\Models\Role as RoleModel;
use App\Models\User as UserModel;
use App\Contracts\Models\Group;
use App\Contracts\Models\Position;
use App\Contracts\Models\User;
use App\Contracts\Repositories\Role as RoleContract;
use Illuminate\Support\Collection;

/**
 * Class Role
 * @package App\Repositories
 */
class Role extends RoleContract
{


    /**
     * @inheritDoc
     */
    public function getById($id): \App\Contracts\Models\Role
    {
        return App\Models\Role::where('id', $id)->get()->first();
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return App\Models\Role::all();
    }
}
