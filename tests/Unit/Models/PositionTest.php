<?php

namespace Tests\Unit\Models;

use App\Models\Position;
use App\Models\Role;
use App\Models\Tags\PositionTag;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PositionTest extends TestCase
{
    // TODO Test ID method
    // TODO Test name method
    // TODO Test description method
    /** @test */
    public function tagRelationship_returns_all_tags_the_position_has(){
        $positionTags = factory(PositionTag::class, 5)->create();
        $position = factory(Position::class)->create();

        DB::table('control_taggables')->insert($positionTags->map(function($positionTag) use ($position) {
            return ['tag_id' => $positionTag->id, 'taggable_id' => $position->id, 'taggable_type' => Position::class];
        })->toArray());

        $tags = $position->tagRelationship;
        $this->assertEquals(5, $tags->count());
        foreach($positionTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }

    /** @test */
    public function tags_returns_all_tags_the_position_has(){
        $positionTags = factory(PositionTag::class, 5)->create();
        $position = factory(Position::class)->create();

        DB::table('control_taggables')->insert($positionTags->map(function($positionTag) use ($position) {
            return ['tag_id' => $positionTag->id, 'taggable_id' => $position->id, 'taggable_type' => Position::class];
        })->toArray());

        $tags = $position->tags();
        $this->assertEquals(5, $tags->count());
        foreach($positionTags as $tag) {
            $this->assertTrue($tag->is($tags->shift()));
        }
    }

    /** @test */
    public function tagRelationship_can_be_used_to_save_a_tag(){
        $tags = factory(PositionTag::class, 5)->make();
        $position = factory(Position::class)->create();

        $position->tagRelationship()->saveMany($tags);

        foreach($tags as $tag) {
            $this->assertDatabaseHas('control_taggables', [
                'tag_id' => $tag->id,
                'taggable_id' => $position->id,
                'taggable_type' => Position::class
            ]);
        }
    }

    /** @test */
    public function roleRelationship_returns_all_roles_the_position_has(){
        $position = factory(Position::class)->create();
        $roles = factory(Role::class, 10)->create(['position_id' => $position->id]);

        $positionRoles = $position->roleRelationship;
        $this->assertEquals(10, $positionRoles->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($positionRoles->shift()));
        }
    }

    /** @test */
    public function roles_returns_all_roles_the_position_has(){
        $position = factory(Position::class)->create();
        $roles = factory(Role::class, 10)->create(['position_id' => $position->id]);

        $positionRoles = $position->roles();
        $this->assertEquals(10, $positionRoles->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($positionRoles->shift()));
        }
    }

    /** @test */
    public function roleRelationship_can_be_used_to_save_a_role(){
        $position = factory(Position::class)->create();
        $roles = factory(Role::class, 10)->make();

        $position->roleRelationship()->saveMany($roles);

        $dbRoles = Role::where('position_id', $position->id)->get();
        $this->assertEquals(10, $dbRoles->count());
        foreach($roles as $role) {
            $this->assertTrue($role->is($dbRoles->shift()));
        }
    }

}
