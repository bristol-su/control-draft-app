<?php


namespace App\Models;


use App\Models\Tags\PositionTag;
use App\Models\Tags\RoleTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model implements \App\Contracts\Models\Role
{

    use SoftDeletes;

    protected $table = 'control_roles';

    protected $guarded = [];


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id();
    }

    /**
     * Get the ID of the role
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    /**
     * ID of the position
     *
     * @return mixed
     */
    public function positionId()
    {
        return $this->position_id;
    }

    public function email(): ?string
    {
        return $this->email;
    }

    /**
     * ID of the group
     *
     * @return mixed
     */
    public function groupId()
    {
        return $this->group_id;
    }

    /**
     * Name of the position
     * @return string
     */
    public function positionName(): string
    {
        return $this->position()->name();
    }

    /**
     * Position belonging to the role
     *
     * @return Position
     */
    public function position(): \App\Contracts\Models\Position
    {
        return $this->positionRelationship;
    }

    /**
     * Group belonging to the role
     *
     * @return Group
     */
    public function group(): \App\Contracts\Models\Group
    {
        return $this->groupRelationship;
    }

    /**
     * Users who occupy the role
     *
     * @return Collection
     */
    public function users(): Collection
    {
        return $this->userRelationship;
    }

    /**
     * Tags the role is tagged with
     *
     * @return Collection
     */
    public function tags(): Collection
    {
        return $this->tagRelationship;
    }

    public function positionRelationship()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function groupRelationship()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function userRelationship()
    {
        return $this->belongsToMany(User::class, 'control_role_user');
    }

    public function tagRelationship()
    {
        return $this->morphToMany(RoleTag::class,
            'taggable',
            'control_taggables',
            'taggable_id',
            'tag_id');
    }
}
