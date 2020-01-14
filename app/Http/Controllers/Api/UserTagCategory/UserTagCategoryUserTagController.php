<?php

namespace App\Http\Controllers\Api\UserTagCategory;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\UserTagCategory;

class UserTagCategoryUserTagController extends Controller
{

    public function index(UserTagCategory $userTagCategory)
    {
        return $userTagCategory->tags();
    }

}
