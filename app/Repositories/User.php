<?php


namespace App\Repositories;


use App\Contracts\Models\Group as GroupModel;
use App\Contracts\Models\Role as RoleModel;
use App\Contracts\Models\User as UserModelContract;
use App\Contracts\Repositories\User as UserContract;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Repositories
 */
class User extends UserContract
{


    /**
     * @inheritDoc
     */
    public function getById(int $id): UserModelContract
    {
        // TODO: Implement getById() method.
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        // TODO: Implement all() method.
    }

    /**
     * @inheritDoc
     */
    public function create(string $forename, string $surname, string $email): UserModelContract
    {
        // TODO: Implement create() method.
    }
}
