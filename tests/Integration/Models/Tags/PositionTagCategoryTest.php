<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\PositionTagCategory;
use App\Models\Tags\UserTagCategory;
use Tests\TestCase;

class PositionTagCategoryTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_position_tag_categories(){
        $positionTagCategory = factory(PositionTagCategory::class)->create();
        $userTagCategory = factory(UserTagCategory::class)->create();

        $this->assertEquals(1, PositionTagCategory::all()->count());
        $this->assertTrue($positionTagCategory->is(PositionTagCategory::first()));
    }

}
