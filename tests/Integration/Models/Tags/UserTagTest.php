<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\GroupTag;
use App\Models\Tags\UserTag;
use Tests\TestCase;

class UserTagTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_user_tags(){
        $userTag = factory(UserTag::class)->create();
        $groupTag = factory(GroupTag::class)->create();

        $this->assertEquals(1, UserTag::all()->count());
        $this->assertTrue($userTag->is(UserTag::first()));
    }

}
