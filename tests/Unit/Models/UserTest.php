<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use Tests\TestCase;

class UserTest extends TestCase
{

    /** @test */
    public function getAuthIdentifierName_returns_id(){
        $group = factory(Group::class)->create();
        $this->assertEquals('id', $group->getAuthIdentifierName());
    }

    /** @test */
    public function getAuthIdentifier_returns_the_id(){
        $group = factory(Group::class)->create(['id' => 2]);
        $this->assertEquals(2, $group->getAuthIdentifier());
    }

    /** @test */
    public function tagRelationship_returns_all_tags_associated_with_the_user(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function tagRelationship_can_be_used_to_save_a_tag(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function tags_returns_all_tags_associated_with_the_user(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function roleRelationship_returns_all_roles_associated_with_the_user(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function roleRelationship_can_be_used_to_save_a_role(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function roles_returns_all_roles_associated_with_the_user(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function groupRelationship_returns_all_groups_associated_with_the_user(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function groupRelationship_can_be_used_to_save_a_group(){
        $this->markTestIncomplete();
    }

    /** @test */
    public function groups_returns_all_groups_associated_with_the_user(){
        $this->markTestIncomplete();
    }

}
