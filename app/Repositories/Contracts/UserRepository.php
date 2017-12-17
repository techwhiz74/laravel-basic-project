<?php

namespace App\Repositories\Contracts;

interface UserRepository {

    public function getAll();

    public function create(array $attributes);

    public function update(array $attributes);

    public function delete($id);

    public function find($Id);

}
