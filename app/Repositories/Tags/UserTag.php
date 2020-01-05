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
        return \App\Models\Tags\UserTag::all();
    }

    /**
     * @inheritDoc
     */
    public function getTagByFullReference(string $reference): UserTagModel
    {
        return \App\Models\Tags\UserTag::where('reference', $reference)->get()->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): UserTagModel
    {
        return \App\Models\Tags\UserTag::where('id', $id)->get()->firstOrFail();
    }
}
