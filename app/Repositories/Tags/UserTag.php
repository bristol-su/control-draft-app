<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Tags\UserTag as UserTagModel;
use App\Contracts\Models\User;
use App\Contracts\Models\Tags\UserTagCategory;
use App\Contracts\Repositories\Tags\UserTag as UserTagContract;
use Illuminate\Support\Collection;

/**
 * Class UserTag
 * @package App\Repositories
 */
class UserTag extends UserTagContract
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
    public function getTagByFullReference(string $reference): UserTagModel
    {
        // TODO: Implement getTagByFullReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): UserTagModel
    {
        // TODO: Implement getById() method.
    }
}
