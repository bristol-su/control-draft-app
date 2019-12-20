<?php


namespace Tests\Unit\Models\Tags;


use App\Models\Tags\GroupTag;
use Tests\TestCase;

class GroupTagTest extends TestCase
{

    /** @test */
    public function it_has_an_id_attribute(){
        $groupTag = factory(GroupTag::class)->create(['id' => 1]);
        $this->assertEquals(1, $groupTag->id());
    }

}
