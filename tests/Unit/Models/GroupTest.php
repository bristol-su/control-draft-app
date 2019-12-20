<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use App\Models\Role;
use App\Models\Tags\GroupTag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GroupTest extends TestCase
{

    /** @test */
    public function getAuthIdentifierName_returns_id(){
        $group = factory(Group::class)->create();
        $this->assertEquals('id', $group->getAuthIdentifierName());
    }

    /** @test */
    public function getAuthIdentifier_returns_the_id(){
        $group = factory(Group::class)->create(['id' => 2]);
        $this->assertEquals(2, $group->getAuthIdentifier());
    }

    /** @test */
    public function members_returns_all_users_belonging_to_the_group(){
        $users = factory(User::class, 5)->create();
        $group = factory(Group::class)->create();

        DB::table('control_group_user')->insert($users->map(function($user) use ($group) {
            return ['user_id' => $user->id, 'group_id' => $group->id];
        })->toArray());

        $members = $group->members();
        $this->assertEquals(5, $members->count());
        foreach($users as $user) {
            $this->assertTrue($user->is($members->shift()));
        }
    }

    /** @test */
    public function roles_returns_all_roles_belonging_to_the_group(){
        $group = factory(Group::class)->create();
        $roles = factory(Role::class, 5)->create(['group_id' => $group->id]);

        $groupRoles = $group->roles();
        $this->assertEquals(5, $groupRoles->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($groupRoles->shift()));
        }
    }

    /** @test */
    public function tags_returns_all_tags_belonging_to_the_group(){
        $groupTags = factory(GroupTag::class, 5)->create();
        $group = factory(Group::class)->create();

        DB::table('control_taggables')->insert($groupTags->map(function($groupTag) use ($group) {
            return ['tag_id' => $groupTag->id, 'taggable_id' => $group->id, 'taggable_type' => Group::class];
        })->toArray());

        $tags = $group->tags();
        $this->assertEquals(5, $tags->count());
        foreach($groupTags as $groupTag) {
            $this->assertTrue($groupTag->is($tags->shift()));
        }
    }

    /** @test */
    public function userRelationship_returns_all_users_belonging_to_the_group() {
        $users = factory(User::class, 5)->create();
        $group = factory(Group::class)->create();

        DB::table('control_group_user')->insert($users->map(function($user) use ($group) {
            return ['user_id' => $user->id, 'group_id' => $group->id];
        })->toArray());

        $members = $group->userRelationship;
        $this->assertEquals(5, $members->count());
        foreach($users as $user) {
            $this->assertTrue($user->is($members->shift()));
        }
    }

    /** @test */
    public function userRelationship_can_be_used_to_add_a_user_to_a_group() {
        $users = factory(User::class, 5)->make();
        $group = factory(Group::class)->create();

        $group->userRelationship()->saveMany($users);

        foreach($users as $user) {
            $this->assertDatabaseHas('control_group_user', [
                'group_id' => $group->id, 'user_id' => $user->id
            ]);
        }
    }

    /** @test */
    public function roleRelationship_returns_all_roles_belonging_to_the_group() {
        $group = factory(Group::class)->create();
        $roles = factory(Role::class, 5)->create(['group_id' => $group->id]);

        $groupRoles = $group->roleRelationship;
        $this->assertEquals(5, $groupRoles->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($groupRoles->shift()));
        }
    }

    /** @test */
    public function roleRelationship_can_be_used_to_add_a_role_to_a_group() {
        $roles = factory(Role::class, 5)->make();
        $group = factory(Group::class)->create();

        $group->roleRelationship()->saveMany($roles);

        foreach($roles as $role) {
            $this->assertDatabaseHas('control_roles', array_merge($role->toArray(), ['group_id' => $group->id]));
        }
    }

    /** @test */
    public function tagRelationship_returns_all_tags_belonging_to_the_group() {
        $groupTags = factory(GroupTag::class, 5)->create();
        $group = factory(Group::class)->create();

        DB::table('control_taggables')->insert($groupTags->map(function($groupTag) use ($group) {
            return ['tag_id' => $groupTag->id, 'taggable_id' => $group->id, 'taggable_type' => Group::class];
        })->toArray());

        $tags = $group->tagRelationship;
        $this->assertEquals(5, $tags->count());
        foreach($groupTags as $groupTag) {
            $this->assertTrue($groupTag->is($tags->shift()));
        }
    }

    /** @test */
    public function tagRelationship_can_be_used_to_add_a_tag_to_a_group() {
        $tags = factory(GroupTag::class, 5)->make();
        $group = factory(Group::class)->create();

        $group->tagRelationship()->saveMany($tags);

        foreach($tags as $tag) {
            $this->assertDatabaseHas('control_taggables', [
                'tag_id' => $tag->id,
                'taggable_id' => $group->id,
                'taggable_type' => Group::class
            ]);
            $this->assertDatabaseHas('control_tags', $tag->toArray());
        }
    }

}
