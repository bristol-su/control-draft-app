<?php

namespace App\Http\Controllers\Api\UserTag;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Models\Tags\UserTag;

class UserTagUserTagCategoryController extends Controller
{

    public function index(UserTag $userTag)
    {
        return $userTag->category();
    }

}
