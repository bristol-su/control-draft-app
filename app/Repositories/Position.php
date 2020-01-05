<?php


namespace App\Repositories;


use App\Models\Position as PositionModel;
use App\Contracts\Repositories\Position as PositionContract;
use Illuminate\Support\Collection;

/**
 * Class Position
 * @package App\Repositories
 */
class Position extends PositionContract
{


    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return \App\Models\PositionContract::all();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): \App\Contracts\Models\Position
    {
        return \App\Models\PositionContract::where('id', $id)->get()->firstOrFail();
    }
}
