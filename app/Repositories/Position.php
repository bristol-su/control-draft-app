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
        // TODO: Implement all() method.
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): \App\Contracts\Models\Position
    {
        // TODO: Implement getById() method.
    }
}
