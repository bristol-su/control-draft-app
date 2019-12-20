<?php


namespace App\Repositories\Tags;

use App\Contracts\Models\Position;
use App\Contracts\Models\Tags\PositionTag as PositionTagModel;
use App\Contracts\Models\Tags\PositionTagCategory;
use App\Contracts\Repositories\Tags\PositionTag as PositionTagContract;
use Illuminate\Support\Collection;

/**
 * Class PositionTag
 * @package App\Repositories
 */
class PositionTag extends PositionTagContract
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
    public function getTagByFullReference(string $reference): PositionTagModel
    {
        // TODO: Implement getTagByFullReference() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): PositionTagModel
    {
        // TODO: Implement getById() method.
    }
}
