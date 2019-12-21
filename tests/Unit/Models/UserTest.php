<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use App\Models\Role;
use App\Models\Tags\RoleTag;
use App\Models\Tags\UserTag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    // TODO Test ID method
    // TODO Test forename method
    // TODO Test surname method
    // TODO Test email method
    /** @test */
    public function getAuthIdentifierName_returns_id(){
        $group = factory(User::class)->create();
        $this->assertEquals('id', $group->getAuthIdentifierName());
    }

    /** @test */
    public function getAuthIdentifier_returns_the_id(){
        $group = factory(User::class)->create(['id' => 2]);
        $this->assertEquals(2, $group->getAuthIdentifier());
    }

    /** @test */
    public function tagRelationship_returns_all_tags_associated_with_the_user(){
        $userTags = factory(UserTag::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_taggables')->insert($userTags->map(function($userTag) use ($user) {
            return ['tag_id' => $userTag->id, 'taggable_id' => $user->id, 'taggable_type' => User::class];
        })->toArray());

        $tags = $user->tagRelationship;
        $this->assertEquals(5, $tags->count());
        foreach($userTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }

    /** @test */
    public function tagRelationship_can_be_used_to_save_a_tag(){
        $tags = factory(UserTag::class, 5)->make();
        $user = factory(User::class)->create();

        $user->tagRelationship()->saveMany($tags);

        foreach($tags as $tag) {
            $this->assertDatabaseHas('control_taggables', [
                'tag_id' => $tag->id,
                'taggable_id' => $user->id,
                'taggable_type' => User::class
            ]);
        }
    }

    /** @test */
    public function tags_returns_all_tags_associated_with_the_user(){
        $userTags = factory(UserTag::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_taggables')->insert($userTags->map(function($userTag) use ($user) {
            return ['tag_id' => $userTag->id, 'taggable_id' => $user->id, 'taggable_type' => User::class];
        })->toArray());

        $tags = $user->tags();
        $this->assertEquals(5, $tags->count());
        foreach($userTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }

    /** @test */
    public function roleRelationship_returns_all_roles_belonging_to_the_user() {
        $roles = factory(Role::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_role_user')->insert($roles->map(function($role) use ($user) {
            return ['role_id' => $role->id, 'user_id' => $user->id];
        })->toArray());

        $members = $user->roleRelationship;
        $this->assertEquals(5, $members->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($members->shift()));
        }
    }

    /** @test */
    public function roles_returns_all_roles_belonging_to_the_user() {
        $roles = factory(Role::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_role_user')->insert($roles->map(function($role) use ($user) {
            return ['role_id' => $role->id, 'user_id' => $user->id];
        })->toArray());

        $members = $user->roles();
        $this->assertEquals(5, $members->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($members->shift()));
        }
    }

    /** @test */
    public function roleRelationship_can_be_used_to_add_a_role_to_a_user() {
        $roles = factory(Role::class, 5)->make();
        $user = factory(User::class)->create();

        $user->roleRelationship()->saveMany($roles);

        foreach($roles as $role) {
            $this->assertDatabaseHas('control_role_user', [
                'user_id' => $user->id, 'role_id' => $role->id
            ]);
        }
    }

    /** @test */
    public function groups_returns_all_groups_belonging_to_the_user(){
        $groups = factory(Group::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_group_user')->insert($groups->map(function($group) use ($user) {
            return ['group_id' => $group->id, 'user_id' => $user->id];
        })->toArray());

        $groups = $user->groups();
        $this->assertEquals(5, $groups->count());
        foreach($groups as $group) {
            $this->assertTrue($group->is($groups->shift()));
        }
    }

    /** @test */
    public function groupRelationship_returns_all_groups_belonging_to_the_user() {
        $groups = factory(Group::class, 5)->create();
        $user = factory(User::class)->create();

        DB::table('control_group_user')->insert($groups->map(function($group) use ($user) {
            return ['group_id' => $group->id, 'user_id' => $user->id];
        })->toArray());

        $members = $user->groupRelationship;
        $this->assertEquals(5, $members->count());
        foreach($groups as $group) {
            $this->assertTrue($group->is($members->shift()));
        }
    }

    /** @test */
    public function groupRelationship_can_be_used_to_add_a_group_to_a_user() {
        $groups = factory(Group::class, 5)->make();
        $user = factory(User::class)->create();

        $user->groupRelationship()->saveMany($groups);

        foreach($groups as $group) {
            $this->assertDatabaseHas('control_group_user', [
                'user_id' => $user->id, 'group_id' => $group->id
            ]);
        }
    }

}
