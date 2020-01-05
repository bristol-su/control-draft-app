<?php

namespace App\Repositories;

use App\Contracts\Models\Group as GroupModel;
use App\Contracts\Models\Tags\GroupTag;
use App\Contracts\Models\User;
use App\Contracts\Repositories\Group as GroupContract;
use Illuminate\Support\Collection;

/**
 * Class Group
 * @package App\Repositories
 */
class Group extends GroupContract
{

    /**
     * @inheritDoc
     */
    public function getById(int $id): GroupModel
    {
        return \App\Models\GroupContract::where('id', $id)->get()->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return \App\Models\GroupContract::all();
    }
}
