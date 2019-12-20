<?php


namespace App\Contracts\Repositories;


use App\Contracts\Models\Group as GroupModel;
use App\Contracts\Models\Position as PositionModel;
use App\Contracts\Models\Role as RoleModel;
use App\Contracts\Models\User as UserModel;
use Illuminate\Support\Collection;

/**
 * Interface Role
 * @package App\Contracts\Repositories
 */
abstract class Role
{

    /**
     * Get a role by ID
     *
     * @param $id
     * @return RoleModel
     */
    abstract public function getById($id): RoleModel;

    /**
     * Get all roles belonging to a user
     *
     * @param UserModel $user
     * @return Collection
     */
    public function allThroughUser(UserModel $user): Collection {
        return $user->roles();
    }

    /**
     * Get all roles
     *
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * Get all roles belonging to a group
     *
     * @param GroupModel $group
     * @return Collection
     */
    public function allThroughGroup(GroupModel $group): Collection {
        return $group->roles();
    }

    /**
     * Get all roles belonging to a position
     *
     * @param PositionModel $position
     * @return Collection
     */
    public function allThroughPosition(PositionModel $position): Collection {
        return $position->roles();
    }
}
