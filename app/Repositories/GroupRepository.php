<?php


namespace App\Repositories;


use App\Contracts\GroupContract;
use App\Models\Group;

class GroupRepository extends BaseRepository implements GroupContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Group::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Group::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Group::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $group = $this->findOneById($id);
        $group->update($data);
        return $group;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
       return Group::destroy($id);
    }
}
