<?php

namespace Tests\Integration\Models\Tags;

use App\Models\Tags\GroupTag;
use App\Models\Tags\PositionTag;
use Tests\TestCase;

class PositionTagTest extends TestCase
{

    /** @test */
    public function it_uses_the_global_scope_to_only_return_position_tags(){
        $positionTag = factory(PositionTag::class)->create();
        $groupTag = factory(GroupTag::class)->create();

        $this->assertEquals(1, PositionTag::all()->count());
        $this->assertTrue($positionTag->is(PositionTag::first()));
    }

}
