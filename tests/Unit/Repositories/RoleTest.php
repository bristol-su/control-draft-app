<?php

namespace Tests\Unit\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class RoleTest extends TestCase
{

    /** @test */
    public function getById_returns_a_role_model_with_the_corresponding_id(){
        $role = factory(Role::class)->create(['id' => 2]);
        $roleRepo = new \App\Repositories\Role();
        $this->assertTrue(
            $role->is($roleRepo->getById(2))
        );
    }

    /** @test */
    public function getById_throws_a_modelNotFoundException_if_role_does_not_exist(){
        $this->expectException(ModelNotFoundException::class);
        $roleRepo = new \App\Repositories\Role();
        $roleRepo->getById(5);
    }

    /** @test */
    public function all_returns_all_roles(){
        $roles = factory(Role::class, 15)->create();
        $roleRepo = new \App\Repositories\Role();
        $repoRoles = $roleRepo->all();
        foreach($roles as $role) {
            $this->assertTrue($role->is(
                $repoRoles->shift()
            ));
        }
    }


}
