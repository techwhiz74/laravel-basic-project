<?php

namespace App\Repositories\User;

use App\Repositories\Contracts\UserRepository;

use App\Exceptions\User\UserNotCreatedException;
use App\Exceptions\User\UserNotUpdatedException;
use App\Exceptions\User\UserNotDeletedException;
use App\Exceptions\User\UserNotFoundException;

use App\Models\User as User;

class UserEloquentRepository implements UserRepository
{

    public function getAll()
    {
        $allUsers = User::all();

        return $allUsers;
    }

    public function create(array $attributes)
    {
        $user = new User;

        foreach($attributes as $name => $value){
            $user->{$name} = $value;
        }

        if(!$user->save())
            throw new UserNotCreatedException;

        return $user;
    }

    public function update(array $attributes)
    {
        try{
            $user = $this->findFirst();

            foreach($attributes as $name => $value){
                $user->{$name} = $value;
            }

            if(!$user->save())
                throw new UserNotUpdatedException;
        }
        catch(UserNotFoundException $e){
            throw new UserNotUpdatedException;
        }

        return $user;
    }

    public function delete($id)
    {
        if(!find($id)->delete())
            throw new UserNotDeletedException;
        return true;
    }

    public function find($id)
    {
        $user = User::where('id', '=', $id)
            ->first();

        if ($user === null)
            throw new UserNotFoundException;

        return $user;
    }
}
