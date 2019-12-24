<?php

namespace Tests\Unit\Repositories\Tags;

use App\Models\Group;
use App\Models\Tags\GroupTag;
use App\Models\Tags\GroupTagCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class GroupTagTest extends TestCase
{

    /** @test */
    public function getById_returns_a_group_tag_model_with_the_corresponding_id(){
        $groupTag = factory(GroupTag::class)->create(['id' => 2]);
        $groupTagRepo = new \App\Repositories\Tags\GroupTag();
        $this->assertTrue(
            $groupTag->is($groupTagRepo->getById(2))
        );
    }

    /** @test */
    public function getById_throws_a_modelNotFoundException_if_group_tag_does_not_exist(){
        $this->expectException(ModelNotFoundException::class);
        $groupTagRepo = new \App\Repositories\Tags\GroupTag();
        $groupTagRepo->getById(5);
    }

    /** @test */
    public function all_returns_all_group_tags(){
        $groupTags = factory(GroupTag::class, 15)->create();
        $groupTagRepo = new \App\Repositories\Tags\GroupTag();
        $allTags = $groupTagRepo->all();
        $this->assertInstanceOf(Collection::class, $allTags);
        foreach($groupTags as $groupTag) {
            $this->assertTrue($groupTag->is(
                $allTags->shift()
            ));
        }
    }

    /** @test */
    public function getTagByFullReference_returns_a_tag_given_the_full_reference(){
        $groupTagCategory = factory(GroupTagCategory::class)->create(['reference' => 'ref1']);
        $groupTag = factory(GroupTag::class)->create(['reference' => 'ref2']);

        $groupTagRepo = new \App\Repositories\Tags\GroupTag();
        $groupTagFromRepo = $groupTagRepo->getTagByFullReference('ref1.ref2');
        $this->assertInstanceOf(GroupTag::class, $groupTagFromRepo);
        $this->assertTrue($groupTag->is($groupTagFromRepo));

    }

    /** @test */
    public function getTagByFullReference_throws_an_exception_if_group_tag_not_found(){
        $this->expectException(ModelNotFoundException::class);
        $groupTagRepo = new \App\Repositories\Tags\GroupTag();
        $groupTagRepo->getTagByFullReference('nota.validref');
    }


}
