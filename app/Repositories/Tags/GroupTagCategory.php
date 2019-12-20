<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Tags\GroupTag as GroupTagModel;
use App\Contracts\Models\Tags\GroupTagCategory as GroupTagCategoryModel;
use App\Contracts\Repositories\Tags\GroupTagCategory as GroupTagCategoryContract;
use Illuminate\Support\Collection;

/**
 * Class GroupTag
 * @package App\Repositories
 */

class GroupTagCategory extends GroupTagCategoryContract
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
    public function getByReference(string $reference): GroupTagCategoryModel
    {
        // TODO: Implement getByReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): GroupTagCategoryModel
    {
        // TODO: Implement getById() method.
    }
}
