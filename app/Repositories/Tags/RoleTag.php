<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Role;
use App\Contracts\Models\Tags\RoleTag as RoleTagModel;
use App\Contracts\Models\Tags\RoleTagCategory;
use App\Contracts\Repositories\Tags\RoleTag as RoleTagContract;
use Illuminate\Support\Collection;

/**
 * Class RoleTag
 * @package App\Repositories
 */
class RoleTag extends RoleTagContract
{

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
    public function getTagByFullReference(string $reference): RoleTagModel
    {
        // TODO: Implement getTagByFullReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): RoleTagModel
    {
        // TODO: Implement getById() method.
    }
}
