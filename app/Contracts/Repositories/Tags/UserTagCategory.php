<?php


namespace App\Contracts\Repositories\Tags;

use App\Contracts\Models\Tags\UserTag as UserTagModel;
use App\Contracts\Models\Tags\UserTagCategory as UserTagCategoryModel;
use Illuminate\Support\Collection;

/**
 * Interface UserTag
 * @package App\Contracts\Repositories
 */
abstract class UserTagCategory
{

    /**
     * Get all user tag categories
     *
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * Get the user tag category of a user tag
     *
     * @param UserTagModel $user
     * @return UserTagCategoryModel
     */
    public function getThroughTag(UserTagModel $user): UserTagCategoryModel {
        return $user->category();
    }

    /**
     * Get a tag category by the reference
     *
     * @param $reference
     * @return mixed
     */
    abstract public function getByReference(string $reference): UserTagCategoryModel;

    /**
     * Get a user tag category by id
     *
     * @param int $id
     * @return UserTagCategoryModel
     */
    abstract public function getById(int $id): UserTagCategoryModel;
}
