<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Tags\RoleTag as RoleTagModel;
use App\Contracts\Models\Tags\RoleTagCategory as RoleTagCategoryModel;
use App\Contracts\Repositories\Tags\RoleTagCategory as RoleTagCategoryContract;
use Illuminate\Support\Collection;

/**
 * Class RoleTag
 * @package App\Repositories
 */
class RoleTagCategory extends RoleTagCategoryContract
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
    public function getByReference(string $reference): RoleTagCategoryModel
    {
        // TODO: Implement getByReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): RoleTagCategoryModel
    {
        // TODO: Implement getById() method.
    }
}
