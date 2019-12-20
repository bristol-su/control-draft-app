<?php


namespace App\Models\Tags;


use App\Models\Position;
use App\Scopes\PositionTagScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class PositionTag
 * @package App\Models
 */
class PositionTag extends Model implements \App\Contracts\Models\Tags\PositionTag
{
    use SoftDeletes;

    protected $table = 'control_tags';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PositionTagScope());
    }

    /**
     * ID of the position tag
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
     * @return PositionTagCategory
     */
    public function category(): \App\Contracts\Models\Tags\PositionTagCategory
    {
        return $this->categoryRelationship;
    }

    /**
     * Positions who have this tag
     *
     * @return Collection
     */
    public function positions(): Collection
    {
        return $this->positionRelationship;
    }

    public function categoryRelationship()
    {
        return $this->belongsTo(PositionTagCategory::class, 'tag_category_id');
    }

    public function positionRelationship()
    {
        return $this->morphedByMany(Position::class, 'taggable', 'control_taggables', 'tag_id',
            'taggable_id');
    }
}
