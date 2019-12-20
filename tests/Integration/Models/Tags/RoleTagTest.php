<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\GroupTag;
use App\Models\Tags\RoleTag;
use Tests\TestCase;

class RoleTagTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_role_tags(){
        $roleTag = factory(RoleTag::class)->create();
        $groupTag = factory(GroupTag::class)->create();

        $this->assertEquals(1, RoleTag::all()->count());
        $this->assertTrue($roleTag->is(RoleTag::first()));
    }

}
