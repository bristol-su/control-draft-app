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
        return \App\Models\Tags\RoleTag::all();
    }

    /**
     * @inheritDoc
     */
    public function getTagByFullReference(string $reference): RoleTagModel
    {
        return \App\Models\Tags\RoleTag::where('reference', $reference)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): RoleTagModel
    {
        return \App\Models\Tags\RoleTag::where('id', $id)->firstOrFail();
    }
}
