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
        /*$full_ref = explode('.', $reference);
        $category_ref = $full_ref[0];
        $tag_ref = $full_ref[1];

        // get category id
        try {
            $category_id = \App\Models\Tags\GroupTag::where('reference', $reference)->get()->firstOrFail()->id;

        } catch (ModelNotFoundException $e) {
            // no category exists with this reference
        }*/

        return \App\Models\Tags\GroupTag::where('reference', $reference)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): \App\Contracts\Models\Tags\GroupTag
    {
        return \App\Models\Tags\GroupTag::where('id', $id)->firstOrFail();
    }
}
