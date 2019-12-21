<?php

namespace Tests\Unit\Models\Tags;

use App\Models\Tags\PositionTag;
use App\Models\Tags\PositionTagCategory;
use Tests\TestCase;

class PositionTagCategoryTest extends TestCase
{
    // TODO Test ID method
    // TODO Test name method
    // TODO Test description method
    // TODO Test reference method
    /** @test */
    public function tagRelationship_returns_all_tags_related_to_the_category(){
        $tagCategory1 = factory(PositionTagCategory::class)->create();
        $tags1 = factory(PositionTag::class, 5)->create(['tag_category_id' => $tagCategory1->id]);
        // Data that shouldn't be returned
        $tagCategory2 = factory(PositionTagCategory::class)->create();
        $tags2 = factory(PositionTag::class, 5)->create(['tag_category_id' => $tagCategory2->id]);

        $tagsFromRelationship = $tagCategory1->tagRelationship;
        $this->assertEquals(5, $tagsFromRelationship->count());
        foreach($tags1 as $tag) {
            $this->assertTrue($tag->is($tagsFromRelationship->shift()));
        }
    }

    /** @test */
    public function tags_returns_the_tag_relationship_result(){
        $tagCategory1 = factory(PositionTagCategory::class)->create();
        $tags1 = factory(PositionTag::class, 5)->create(['tag_category_id' => $tagCategory1->id]);
        // Data that shouldn't be returned
        $tagCategory2 = factory(PositionTagCategory::class)->create();
        $tags2 = factory(PositionTag::class, 5)->create(['tag_category_id' => $tagCategory2->id]);

        $tagsFromRelationship = $tagCategory1->tags();
        $this->assertEquals(5, $tagsFromRelationship->count());
        foreach($tags1 as $tag) {
            $this->assertTrue($tag->is($tagsFromRelationship->shift()));
        }
    }

}
