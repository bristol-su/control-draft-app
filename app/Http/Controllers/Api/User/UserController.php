<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use BristolSU\ControlDB\Contracts\Repositories\User as UserRepository;

class UserController extends Controller
{
    public function index(UserRepository $userRepository)
    {
        return $userRepository->all();
    }


}
