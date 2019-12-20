<?php


namespace App\Models\Tags;


use App\Models\User;
use App\Scopes\UserTagScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class UserTag
 * @package App\Models
 */
class UserTag extends Model implements \App\Contracts\Models\Tags\UserTag
{

    use SoftDeletes;

    protected $table = 'control_tags';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserTagScope());
    }

    /**
     * ID of the user tag
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * Name of the tag
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Description of the tag
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Reference of the tag
     *
     * @return string
     */
    public function reference(): string
    {
        return $this->reference;
    }

    /**
     * ID of the tag category
     * @return int
     */
    public function categoryId(): int
    {
        return $this->tag_category_id;
    }

    /**
     * Full reference of the tag
     *
     * This should be the tag category reference and the tag reference, separated with a period.
     * @return string
     */
    public function fullReference(): string
    {
        return $this->category()->reference() . '.' . $this->reference;
    }

    /**
     * Tag Category
     *
     * @return UserTagCategory
     */
    public function category(): \App\Contracts\Models\Tags\UserTagCategory
    {
        return $this->categoryRelationship;
    }

    /**
     * Users who have this tag
     *
     * @return Collection
     */
    public function users(): Collection
    {
        return $this->userRelationship;
    }

    public function categoryRelationship()
    {
        return $this->belongsTo(UserTagCategory::class, 'tag_category_id');
    }

    public function userRelationship()
    {
        return $this->morphedByMany(User::class, 'taggable', 'control_taggables', 'tag_id',
            'taggable_id');
    }
}
