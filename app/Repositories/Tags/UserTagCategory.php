<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Tags\UserTag as UserTagModel;
use App\Contracts\Models\Tags\UserTagCategory as UserTagCategoryModel;
use App\Contracts\Repositories\Tags\UserTagCategory as UserTagCategoryContract;
use Illuminate\Support\Collection;

/**
 * Class UserTag
 * @package App\Repositories
 */
class UserTagCategory extends UserTagCategoryContract
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
    public function getByReference(string $reference): UserTagCategoryModel
    {
        // TODO: Implement getByReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): UserTagCategoryModel
    {
        // TODO: Implement getById() method.
    }
}
