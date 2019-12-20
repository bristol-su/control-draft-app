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
        // TODO: Implement all() method.
    }

    /**
     * @inheritDoc
     */
    public function getTagByFullReference(string $reference): \App\Contracts\Models\Tags\GroupTag
    {
        // TODO: Implement getTagByFullReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): \App\Contracts\Models\Tags\GroupTag
    {
        // TODO: Implement getById() method.
    }
}
