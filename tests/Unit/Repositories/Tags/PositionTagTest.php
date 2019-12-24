<?php

namespace Tests\Unit\Repositories\Tags;

use App\Models\Position;
use App\Models\Tags\PositionTag;
use App\Models\Tags\PositionTagCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PositionTagTest extends TestCase
{

    /** @test */
    public function getById_returns_a_position_tag_model_with_the_corresponding_id(){
        $positionTag = factory(PositionTag::class)->create(['id' => 2]);
        $positionTagRepo = new \App\Repositories\Tags\PositionTag();
        $this->assertTrue(
            $positionTag->is($positionTagRepo->getById(2))
        );
    }

    /** @test */
    public function getById_throws_a_modelNotFoundException_if_position_tag_does_not_exist(){
        $this->expectException(ModelNotFoundException::class);
        $positionTagRepo = new \App\Repositories\Tags\PositionTag();
        $positionTagRepo->getById(5);
    }

    /** @test */
    public function all_returns_all_position_tags(){
        $positionTags = factory(PositionTag::class, 15)->create();
        $positionTagRepo = new \App\Repositories\Tags\PositionTag();
        $allTags = $positionTagRepo->all();
        $this->assertInstanceOf(Collection::class, $allTags);
        foreach($positionTags as $positionTag) {
            $this->assertTrue($positionTag->is(
                $allTags->shift()
            ));
        }
    }

    /** @test */
    public function getTagByFullReference_returns_a_tag_given_the_full_reference(){
        $positionTagCategory = factory(PositionTagCategory::class)->create(['reference' => 'ref1']);
        $positionTag = factory(PositionTag::class)->create(['reference' => 'ref2']);

        $positionTagRepo = new \App\Repositories\Tags\PositionTag();
        $positionTagFromRepo = $positionTagRepo->getTagByFullReference('ref1.ref2');
        $this->assertInstanceOf(PositionTag::class, $positionTagFromRepo);
        $this->assertTrue($positionTag->is($positionTagFromRepo));

    }

    /** @test */
    public function getTagByFullReference_throws_an_exception_if_position_tag_not_found(){
        $this->expectException(ModelNotFoundException::class);
        $positionTagRepo = new \App\Repositories\Tags\PositionTag();
        $positionTagRepo->getTagByFullReference('nota.validref');
    }


}
