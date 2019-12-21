<?php


namespace App\Models;


use App\Contracts\Models\User as UserContract;
use App\Models\Tags\UserTag;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Models
 */
class User extends Model implements UserContract
{
    use SoftDeletes;

    protected $table = 'control_users';

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
     * ID of the user
     *
     * @return mixed
     */
    public function id()
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
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
    }

    /**
     * Tags the user is tagged with
     *
     * @return Collection
     */
    public function tags(): Collection
    {
        return $this->tagRelationship;
    }

    /**
     * Roles the user owns
     *
     * @return Collection
     */
    public function roles(): Collection
    {
        return $this->roleRelationship;
    }

    /**
     * Groups the user is a member of
     *
     * @return Collection
     */
    public function groups(): Collection
    {
        return $this->groupRelationship;
    }

    public function tagRelationship()
    {
        return $this->morphToMany(UserTag::class,
            'taggable',
            'control_taggables',
            'taggable_id',
            'tag_id');
    }

    public function roleRelationship()
    {
        return $this->belongsToMany(Role::class, 'control_role_user');
    }

    public function groupRelationship()
    {
        return $this->belongsToMany(Group::class, 'control_group_user');
    }

    public function forename(): string
    {
        // TODO: Implement forename() method.
    }

    public function surname(): string
    {
        // TODO: Implement surname() method.
    }

    public function email(): ?string
    {
        // TODO: Implement email() method.
    }
}
