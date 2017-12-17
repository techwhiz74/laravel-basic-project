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
        $allUser = User::all();

        return $allUser;
    }

    public function create(array $attributes)
    {
        $User = new User;

        foreach($attributes as $name => $value){
            $User->{$name} = $value;
        }

        if(!$User->save())
            throw new UserNotCreatedException;

        return $User;
    }

    public function update(array $attributes)
    {
        try{
            $User = $this->findFirst();

            foreach($attributes as $name => $value){
                $User->{$name} = $value;
            }

            if(!$User->save())
                throw new UserNotUpdatedException;
        }
        catch(UserNotFoundException $e){
            throw new UserNotUpdatedException;
        }

        return $User;
    }

    public function delete($id)
    {
        if(!find($id)->delete())
            throw new UserNotDeletedException;
        return true;
    }

    public function find($id)
    {
        $User = User::where('id', '=', $id)
            ->first();

        if ($User === null)
            throw new UserNotFoundException;

        return $User;
    }
}
