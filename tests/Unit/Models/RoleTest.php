<?php

namespace Tests\Unit\Models\Tags;

use App\Models\Group;
use App\Models\Position;
use App\Models\Role;
use App\Models\Tags\PositionTag;
use App\Models\Tags\RoleTag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleTest extends TestCase
{

    /** @test */
    public function tagRelationship_returns_all_tags_associated_with_the_role(){
        $roleTags = factory(RoleTag::class, 5)->create();
        $role = factory(Role::class)->create();

        DB::table('control_taggables')->insert($roleTags->map(function($roleTag) use ($role) {
            return ['tag_id' => $roleTag->id, 'taggable_id' => $role->id, 'taggable_type' => Role::class];
        })->toArray());

        $tags = $role->tagRelationship;
        $this->assertEquals(5, $tags->count());
        foreach($roleTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }

    /** @test */
    public function tagRelationship_can_be_used_to_save_a_tag(){
        $tags = factory(RoleTag::class, 5)->make();
        $role = factory(Role::class)->create();

        $role->tagRelationship()->saveMany($tags);

        foreach($tags as $tag) {
            $this->assertDatabaseHas('control_taggables', [
                'tag_id' => $tag->id,
                'taggable_id' => $role->id,
                'taggable_type' => Role::class
            ]);
        }
    }

    /** @test */
    public function tags_returns_all_tags_associated_with_the_role(){
        $roleTags = factory(RoleTag::class, 5)->create();
        $role = factory(Role::class)->create();

        DB::table('control_taggables')->insert($roleTags->map(function($roleTag) use ($role) {
            return ['tag_id' => $roleTag->id, 'taggable_id' => $role->id, 'taggable_type' => Role::class];
        })->toArray());

        $tags = $role->tags();
        $this->assertEquals(5, $tags->count());
        foreach($roleTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }


    /** @test */
    public function userRelationship_returns_all_users_associated_with_the_role(){
        $users = factory(User::class, 5)->create();
        $role = factory(Role::class)->create();

        DB::table('control_role_user')->insert($users->map(function($user) use ($role) {
            return ['user_id' => $user->id, 'role_id' => $role->id, 'position_name' => 'Position'];
        })->toArray());

        $usersThroughRole = $role->userRelationship;
        $this->assertEquals(5, $usersThroughRole->count());
        foreach($users as $user) {
            $this->assertTrue($user->is($usersThroughRole->shift()));
        }
    }

    /** @test */
    public function userRelationship_can_be_used_to_save_a_user(){
        $users = factory(User::class, 5)->make();
        $role = factory(Role::class)->create();

        $role->userRelationship()->saveMany($users, $users->map(function($user) {
            return ['position_name' => 'A Name'];
        })->toArray());

        foreach($users as $user) {
            $this->assertDatabaseHas('control_role_user', [
                'user_id' => $user->id,
                'role_id' => $role->id,
                'position_name' => 'A Name'
            ]);
            $this->assertDatabaseHas('control_users', $user->toArray());
        }
    }

    /** @test */
    public function users_returns_all_users_associated_with_the_role(){
        $users = factory(User::class, 5)->create();
        $role = factory(Role::class)->create();

        DB::table('control_role_user')->insert($users->map(function($user) use ($role) {
            return ['user_id' => $user->id, 'role_id' => $role->id, 'position_name' => 'Position'];
        })->toArray());

        $usersThroughRole = $role->users();
        $this->assertEquals(5, $usersThroughRole->count());
        foreach($users as $user) {
            $this->assertTrue($user->is($usersThroughRole->shift()));
        }
    }


    /** @test */
    public function groupRelationship_returns_the_group_associated_with_the_role(){
        $group = factory(Group::class)->create();
        $role = factory(Role::class)->create(['group_id' => $group->id]);

        $groupThroughRole = $role->groupRelationship;
        $this->assertInstanceOf(Group::class, $groupThroughRole);
        $this->assertTrue($group->is($groupThroughRole));
    }

    /** @test */
    public function groups_returns_all_groups_associated_with_the_role(){
        $group = factory(Group::class)->create();
        $role = factory(Role::class)->create(['group_id' => $group->id]);

        $groupThroughRole = $role->group();
        $this->assertInstanceOf(Group::class, $groupThroughRole);
        $this->assertTrue($group->is($groupThroughRole));
    }

    /** @test */
    public function positionRelationship_returns_the_position_associated_with_the_role(){
        $position = factory(Position::class)->create();
        $role = factory(Role::class)->create(['position_id' => $position->id]);

        $positionThroughRole = $role->positionRelationship;
        $this->assertInstanceOf(Position::class, $positionThroughRole);
        $this->assertTrue($position->is($positionThroughRole));
    }

    /** @test */
    public function positions_returns_all_positions_associated_with_the_role(){
        $position = factory(Position::class)->create();
        $role = factory(Role::class)->create(['position_id' => $position->id]);

        $positionThroughRole = $role->position();
        $this->assertInstanceOf(Position::class, $positionThroughRole);
        $this->assertTrue($position->is($positionThroughRole));
    }

    /** @test */
    public function positionName_returns_the_position_name_from_the_pivot_table(){
        $this->markTestIncomplete();
    }

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
}
