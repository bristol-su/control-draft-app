<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\GroupTagCategory;
use App\Models\Tags\UserTagCategory;
use Tests\TestCase;

class GroupTagCategoryTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_group_tag_categories(){
        $groupTagCategory = factory(GroupTagCategory::class)->create();
        $userTagCategory = factory(UserTagCategory::class)->create();

        $this->assertEquals(1, GroupTagCategory::all()->count());
        $this->assertTrue($groupTagCategory->is(GroupTagCategory::first()));
    }

}
