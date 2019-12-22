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
        return App\Models\Tags\RoleTagCategory::all();
    }

    /**
     * @inheritDoc
     */
    public function getByReference(string $reference): RoleTagCategoryModel
    {
        return App\Models\Tags\RoleTagCategory::where('reference', $reference)->get()->first();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): RoleTagCategoryModel
    {
        return App\Models\Tags\RoleTagCategory::where('id', $id)->get()->first();
    }
}
