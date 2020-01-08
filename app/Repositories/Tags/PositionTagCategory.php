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
        return \App\Models\Tags\PositionTagCategory::all();
    }

    /**
     * @inheritDoc
     */
    public function getByReference(string $reference): PositionTagCategoryModel
    {
        return \App\Models\Tags\PositionTagCategory::where('reference', $reference)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): PositionTagCategoryModel
    {
        return \App\Models\Tags\PositionTagCategory::where('id', $id)->firstOrFail();
    }
}
