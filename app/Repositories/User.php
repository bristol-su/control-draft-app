<?php


namespace App\Repositories;


use App\Contracts\Models\Group as GroupModel;
use App\Contracts\Models\Role as RoleModel;
use App\Contracts\Models\User as UserModelContract;
use App\Contracts\Repositories\User as UserContract;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Repositories
 */
class User extends UserContract
{


    /**
     * @inheritDoc
     */
    public function getById(int $id): UserModelContract
    {
        return \App\Models\User::where('id', $id)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return \App\Models\User::all();
    }

    /**
     * @inheritDoc
     */
    public function create(string $forename, string $surname, string $email): UserModelContract
    {
        //// validation to be moved to the controller

        // check that email is not already registered
        /*if (is_null(App\Models\User::where('email', $email)->get()->first())) 
        {
            // check entries are valid
            $validator = Validator::make(
                [
                    'forename' => $forename,
                    'surname' => $surname,
                    'email' => $email
                ],
                [
                    'forename' => 'required|min:2|max:30|alpha_dash',
                    'surname' => 'required|min:2|max:30|alpha_dash',
                    'email' => 'required|email|unique:control_users,email'
                ]);

            if ($validator->fails())
            {
                return $validator->messages();
            }
            else
            {*/
                // validation has passed, create the new user entry
                $new_user = new \App\Models\User;
                $new_user->forename = $forename;
                $new_user->surname = $surname;
                $new_user->email = $email;
                $new_user->save();

                return $new_user;
            /*}
        }
        else
        {
            return "Email already registered"; // temporary response
        }*/
    }
}
