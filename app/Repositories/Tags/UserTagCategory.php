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
        return \App\Models\Tags\UserTagCategory::all();
    }

    /**
     * @inheritDoc
     */
    public function getByReference(string $reference): UserTagCategoryModel
    {
        return \App\Models\Tags\UserTagCategory::where('reference', $reference)->get()->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): UserTagCategoryModel
    {
        return \App\Models\Tags\UserTagCategory::where('id', $id)->get()->firstOrFail();
    }
}
