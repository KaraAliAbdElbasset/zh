<?php


namespace App\Repositories;


use App\Contracts\UserContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{

    public function findOneById($id, array $relations = [])
    {
        return User::with($relations)->findOrFail($id);
    }

    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = User::with($relations)->scopes($scopes)->newQuery();

        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    public function add(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        $user = $this->findOneById($id);
        if (array_key_exists('password',$data))
        {
            $data['password'] = bcrypt($data['password']);
        }
        return $user->update($data);
    }

    public function delete(int $id)
    {
        return User::destroy($id);
    }
}
