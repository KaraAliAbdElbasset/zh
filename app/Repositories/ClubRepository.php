<?php


namespace App\Repositories;


use App\Models\Club;

class ClubRepository extends BaseRepository implements \App\Contracts\ClubContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Club::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Club::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Club::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $club = $this->findOneById($id);
        $club->update($data);

        return $club;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Club::destroy($id);
    }
}
