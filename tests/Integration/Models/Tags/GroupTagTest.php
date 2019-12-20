<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\GroupTag;
use App\Models\Tags\UserTag;
use Tests\TestCase;

class GroupTagTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_group_tags(){
        $groupTag = factory(GroupTag::class)->create();
        $userTag = factory(UserTag::class)->create();

        $this->assertEquals(1, GroupTag::all()->count());
        $this->assertTrue($groupTag->is(GroupTag::first()));
    }

}
