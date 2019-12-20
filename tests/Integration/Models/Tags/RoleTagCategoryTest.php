<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\RoleTagCategory;
use App\Models\Tags\UserTagCategory;
use Tests\TestCase;

class RoleTagCategoryTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_role_tag_categories(){
        $roleTagCategory = factory(RoleTagCategory::class)->create();
        $userTagCategory = factory(UserTagCategory::class)->create();

        $this->assertEquals(1, RoleTagCategory::all()->count());
        $this->assertTrue($roleTagCategory->is(RoleTagCategory::first()));
    }

}
