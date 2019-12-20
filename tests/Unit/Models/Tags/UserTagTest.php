<?php


namespace Tests\Unit\Models\Tags;


use App\Models\User;
use App\Models\Position;
use App\Models\Role;
use App\Models\Tags\UserTag;
use App\Models\Tags\UserTagCategory;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTagTest extends TestCase
{

    /** @test */
    public function it_has_an_id_attribute(){
        $userTag = factory(UserTag::class)->create(['id' => 1]);
        $this->assertEquals(1, $userTag->id());
    }

    /** @test */
    public function category_relationship_returns_the_owning_category(){
        $userTagCategory = factory(UserTagCategory::class)->create();
        $userTag = factory(UserTag::class)->create(['tag_category_id' => $userTagCategory->id]);

        $this->assertInstanceOf(UserTagCategory::class, $userTag->categoryRelationship);
        $this->assertTrue($userTagCategory->is($userTag->categoryRelationship));
    }

    /** @test */
    public function category_returns_the_owning_category(){
        $userTagCategory = factory(UserTagCategory::class)->create();
        $userTag = factory(UserTag::class)->create(['tag_category_id' => $userTagCategory->id]);

        $this->assertInstanceOf(UserTagCategory::class, $userTag->category());
        $this->assertTrue($userTagCategory->is($userTag->category()));
    }


    /** @test */
    public function user_relationship_returns_users_with_the_tag(){
        $userTag = factory(UserTag::class)->create();
        // Models which could be linked to a tag. Users, roles and positions should never be returned
        $taggedUsers = factory(User::class, 5)->create();
        $untaggedUsers = factory(User::class, 5)->create();
        $groups = factory(Group::class, 5)->create();
        $roles = factory(Role::class, 5)->create();
        $positions = factory(Position::class, 5)->create();

        DB::table('control_taggables')->insert($taggedUsers->map(function($user) use ($userTag) {
            return ['tag_id' => $userTag->id, 'taggable_id' => $user->id, 'taggable_type' => User::class];
        })->toArray());

        $userUserRelationship = $userTag->userRelationship;
        $this->assertEquals(5, $userUserRelationship->count());
        foreach($taggedUsers as $user) {
            $this->assertTrue($user->is($userUserRelationship->shift()));
        }
    }

    /** @test */
    public function user_relationship_can_be_used_to_tag_a_user(){
        $userTag = factory(UserTag::class)->create();

        $taggedUsers = factory(User::class, 5)->make();
        $userTag->userRelationship()->saveMany($taggedUsers);

        $userUserRelationship = $userTag->userRelationship;
        $this->assertEquals(5, $userUserRelationship->count());
        foreach($taggedUsers as $user) {
            $this->assertTrue($user->is($userUserRelationship->shift()));
        }
    }

    /** @test */
    public function user_returns_all_users_tagged(){
        $userTag = factory(UserTag::class)->create();
        // Models which could be linked to a tag. Users, roles and positions should never be returned
        $taggedUsers = factory(User::class, 5)->create();
        $untaggedUsers = factory(User::class, 5)->create();
        $groups = factory(Group::class, 5)->create();
        $roles = factory(Role::class, 5)->create();
        $positions = factory(Position::class, 5)->create();

        DB::table('control_taggables')->insert($taggedUsers->map(function($user) use ($userTag) {
            return ['tag_id' => $userTag->id, 'taggable_id' => $user->id, 'taggable_type' => User::class];
        })->toArray());

        $userUserRelationship = $userTag->users();
        $this->assertEquals(5, $userUserRelationship->count());
        foreach($taggedUsers as $user) {
            $this->assertTrue($user->is($userUserRelationship->shift()));
        }
    }

    /** @test */
    public function fullReference_returns_the_category_reference_and_the_tag_reference(){
        $userTagCategory = factory(UserTagCategory::class)->create(['reference' => 'categoryreference1']);
        $userTag = factory(UserTag::class)->create(['reference' => 'tagreference1', 'tag_category_id' => $userTagCategory->id]);

        $this->assertEquals('categoryreference1.tagreference1', $userTag->fullReference());
    }

}
