<?php


namespace App\Contracts\Repositories;


use App\Contracts\Models\Position as PositionModel;
use Illuminate\Support\Collection;

/**
 * Interface Position
 * @package App\Contracts\Repositories
 */
abstract class Position
{
    /**
     * Get all positions
     *
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * Get a position by a given ID
     *
     * @param int $id
     * @return PositionModel
     */
    abstract public function getById(int $id): PositionModel;
}
