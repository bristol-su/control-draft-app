<?php


namespace App\Contracts\Repositories\Tags;

use App\Contracts\Models\Role as RoleContract;
use App\Contracts\Models\Tags\RoleTagCategory as RoleTagCategoryContract;
use App\Contracts\Models\Tags\RoleTag as RoleTagModel;
use Illuminate\Support\Collection;

/**
 * Interface RoleTag
 * @package App\Contracts\Repositories
 */
abstract class RoleTag
{

    /**
     * Get all role tags
     *
     * @return Collection
     */
    abstract public function all(): Collection;

    /**
     * Get all role tags which a role is tagged with
     *
     * @param RoleContract $role
     * @return Collection
     */
    public function allThroughRole(RoleContract $role): Collection {
        return $role->tags();
    }

    /**
     * Get a tag by the full reference
     *
     * @param $reference
     * @return mixed
     */
    abstract public function getTagByFullReference(string $reference): RoleTagModel;

    /**
     * Get a role tag by id
     *
     * @param int $id
     * @return RoleTagModel
     */
    abstract public function getById(int $id): RoleTagModel;

    /**
     * Get all role tags belonging to a role tag category
     *
     * @param RoleTagCategoryContract $roleTagCategory
     * @return Collection
     */
    public function allThroughRoleTagCategory(RoleTagCategoryContract $roleTagCategory): Collection {
        return $roleTagCategory->tags();
    }
}
