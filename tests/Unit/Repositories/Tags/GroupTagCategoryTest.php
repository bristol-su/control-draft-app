<?php

namespace Tests\Unit\Repositories\Tags;

use App\Models\Group;
use App\Models\Tags\GroupTag;
use App\Models\Tags\GroupTagCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class GroupTagCategoryTest extends TestCase
{

    /** @test */
    public function getById_returns_a_group_tag_category_model_with_the_corresponding_id(){
        $groupTagCategory = factory(GroupTagCategory::class)->create(['id' => 2]);
        $groupTagCategoryRepo = new \App\Repositories\Tags\GroupTagCategory();
        $this->assertTrue(
            $groupTagCategory->is($groupTagCategoryRepo->getById(2))
        );
    }

    /** @test */
    public function getById_throws_a_modelNotFoundException_if_group_tag_category_does_not_exist(){
        $this->expectException(ModelNotFoundException::class);
        $groupTagCategoryRepo = new \App\Repositories\Tags\GroupTagCategory();
        $groupTagCategoryRepo->getById(5);
    }

    /** @test */
    public function all_returns_all_group_tags_categories(){
        $groupTagCategories = factory(GroupTagCategory::class, 15)->create();
        $groupTagCategoryRepo = new \App\Repositories\Tags\GroupTagCategory();
        $allTagCategories = $groupTagCategoryRepo->all();
        $this->assertInstanceOf(Collection::class, $allTagCategories);
        foreach($groupTagCategories as $groupTagCategory) {
            $this->assertTrue($groupTagCategory->is(
                $allTagCategories->shift()
            ));
        }
    }

    /** @test */
    public function getByReference_returns_a_tag_category_given_the_full_reference(){
        $groupTagCategory = factory(GroupTagCategory::class)->create(['reference' => 'ref1']);

        $groupTagCategoryRepo = new \App\Repositories\Tags\GroupTagCategory();
        $groupTagCategoryFromRepo = $groupTagCategoryRepo->getByReference('ref1');
        $this->assertInstanceOf(GroupTagCategory::class, $groupTagCategoryFromRepo);
        $this->assertTrue($groupTagCategory->is($groupTagCategoryFromRepo));

    }

    /** @test */
    public function getByReference_throws_an_exception_if_group_tag_category_not_found(){
        $this->expectException(ModelNotFoundException::class);
        $groupTagCategoryRepo = new \App\Repositories\Tags\GroupTagCategory();
        $groupTagCategoryRepo->getByReference('notavalidref');
    }


}
