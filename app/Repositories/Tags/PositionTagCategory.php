<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Tags\PositionTag as PositionTagModel;
use App\Contracts\Models\Tags\PositionTagCategory as PositionTagCategoryModel;
use App\Contracts\Repositories\Tags\PositionTagCategory as PositionTagCategoryContract;
use Illuminate\Support\Collection;

/**
 * Class PositionTag
 * @package App\Repositories
 */
class PositionTagCategory extends PositionTagCategoryContract
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
    public function getByReference(string $reference): PositionTagCategoryModel
    {
        // TODO: Implement getByReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): PositionTagCategoryModel
    {
        // TODO: Implement getById() method.
    }
}
