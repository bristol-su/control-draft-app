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
        return \App\Models\Tags\PositionTag::all();
    }

    /**
     * @inheritDoc
     */
    public function getTagByFullReference(string $reference): PositionTagModel
    {
        return \App\Models\Tags\PositionTag::where('reference', $reference)->get()->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): PositionTagModel
    {
        return \App\Models\Tags\PositionTag::where('id', $id)->get()->firstOrFail();
    }
}
