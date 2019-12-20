<?php

namespace App\Models\Tags;

use App\Scopes\PositionTagCategoryScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class PositionTag
 * @package App\Models
 */
class PositionTagCategory extends Model implements \App\Contracts\Models\Tags\PositionTagCategory
{

    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PositionTagCategoryScope());
    }

    protected $table = 'control_tag_categories';
    protected $guarded = [];

    /**
     * ID of the tag category
     *
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Name of the tag category
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Deacription of the tag category
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }

    /**
     * Reference of the tag category
     *
     * @return string
     */
    public function reference(): string
    {
        return $this->reference;
    }

    /**
     * All tags under this tag category
     *
     * @return Collection
     */
    public function tags(): Collection
    {
        return $this->tagRelationship;
    }

    public function tagRelationship()
    {
        return $this->hasMany(PositionTag::class);
    }
}
