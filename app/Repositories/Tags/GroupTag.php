<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Group;
use App\Contracts\Models\Tags\GroupTagCategory;
use App\Contracts\Repositories\Tags\GroupTag as GroupTagContract;
use App\Contracts\Repositories\Tags\GroupTagModel;
use Illuminate\Support\Collection;

/**
 * Class GroupTag
 * @package App\Repositories
 */
class GroupTag extends GroupTagContract
{

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return \App\Models\Tags\GroupTag::all();
    }

    /**
     * @inheritDoc
     */
    public function getTagByFullReference(string $reference): \App\Contracts\Models\Tags\GroupTag
    {
        return \App\Models\Tags\GroupTag::where('reference', $reference)->get()->first();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): \App\Contracts\Models\Tags\GroupTag
    {
        return \App\Models\Tags\GroupTag::where('id', $id)->get()->first();
    }
}
