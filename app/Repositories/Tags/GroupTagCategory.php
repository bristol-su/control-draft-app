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
        return \App\Models\Tags\GroupTagCategory::all();
    }

    /**
     * @inheritDoc
     */
    public function getByReference(string $reference): GroupTagCategoryModel
    {
        return \App\Models\Tags\GroupTagCategory::where('reference', $reference)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): GroupTagCategoryModel
    {
        return \App\Models\Tags\GroupTagCategory::where('id', $id)->firstOrFail();
    }
}
