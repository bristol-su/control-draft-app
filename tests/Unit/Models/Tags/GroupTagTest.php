<?php


namespace Tests\Unit\Models\Tags;


use App\Models\Group;
use App\Models\Position;
use App\Models\Role;
use App\Models\Tags\GroupTag;
use App\Models\Tags\GroupTagCategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GroupTagTest extends TestCase
{

    // TODO Test name method
    // TODO Test description method
    // TODO Test reference method
    // TODO Test categoryId method

    /** @test */
    public function it_has_an_id_attribute(){
        $groupTag = factory(GroupTag::class)->create(['id' => 1]);
        $this->assertEquals(1, $groupTag->id());
    }

    /** @test */
    public function category_relationship_returns_the_owning_category(){
        $groupTagCategory = factory(GroupTagCategory::class)->create();
        $groupTag = factory(GroupTag::class)->create(['tag_category_id' => $groupTagCategory->id]);

        $this->assertInstanceOf(GroupTagCategory::class, $groupTag->categoryRelationship);
        $this->assertTrue($groupTagCategory->is($groupTag->categoryRelationship));
    }

    /** @test */
    public function category_returns_the_owning_category(){
        $groupTagCategory = factory(GroupTagCategory::class)->create();
        $groupTag = factory(GroupTag::class)->create(['tag_category_id' => $groupTagCategory->id]);

        $this->assertInstanceOf(GroupTagCategory::class, $groupTag->category());
        $this->assertTrue($groupTagCategory->is($groupTag->category()));
    }


    /** @test */
    public function group_relationship_returns_groups_with_the_tag(){
        $groupTag = factory(GroupTag::class)->create();
        // Models which could be linked to a tag. Users, roles and positions should never be returned
        $taggedGroups = factory(Group::class, 5)->create();
        $untaggedGroups = factory(Group::class, 5)->create();
        $users = factory(User::class, 5)->create();
        $roles = factory(Role::class, 5)->create();
        $positions = factory(Position::class, 5)->create();

        DB::table('control_taggables')->insert($taggedGroups->map(function($group) use ($groupTag) {
            return ['tag_id' => $groupTag->id, 'taggable_id' => $group->id, 'taggable_type' => Group::class];
        })->toArray());

        $groupGroupRelationship = $groupTag->groupRelationship;
        $this->assertEquals(5, $groupGroupRelationship->count());
        foreach($taggedGroups as $group) {
            $this->assertTrue($group->is($groupGroupRelationship->shift()));
        }
    }

    /** @test */
    public function group_relationship_can_be_used_to_tag_a_group(){
        $groupTag = factory(GroupTag::class)->create();

        $taggedGroups = factory(Group::class, 5)->make();
        $groupTag->groupRelationship()->saveMany($taggedGroups);

        $groupGroupRelationship = $groupTag->groupRelationship;
        $this->assertEquals(5, $groupGroupRelationship->count());
        foreach($taggedGroups as $group) {
            $this->assertTrue($group->is($groupGroupRelationship->shift()));
        }
    }

    /** @test */
    public function group_returns_all_groups_tagged(){
        $groupTag = factory(GroupTag::class)->create();
        // Models which could be linked to a tag. Users, roles and positions should never be returned
        $taggedGroups = factory(Group::class, 5)->create();
        $untaggedGroups = factory(Group::class, 5)->create();
        $users = factory(User::class, 5)->create();
        $roles = factory(Role::class, 5)->create();
        $positions = factory(Position::class, 5)->create();

        DB::table('control_taggables')->insert($taggedGroups->map(function($group) use ($groupTag) {
            return ['tag_id' => $groupTag->id, 'taggable_id' => $group->id, 'taggable_type' => Group::class];
        })->toArray());

        $groupGroupRelationship = $groupTag->groups();
        $this->assertEquals(5, $groupGroupRelationship->count());
        foreach($taggedGroups as $group) {
            $this->assertTrue($group->is($groupGroupRelationship->shift()));
        }
    }

    /** @test */
    public function fullReference_returns_the_category_reference_and_the_tag_reference(){
        $groupTagCategory = factory(GroupTagCategory::class)->create(['reference' => 'categoryreference1']);
        $groupTag = factory(GroupTag::class)->create(['reference' => 'tagreference1', 'tag_category_id' => $groupTagCategory->id]);

        $this->assertEquals('categoryreference1.tagreference1', $groupTag->fullReference());
    }

}
