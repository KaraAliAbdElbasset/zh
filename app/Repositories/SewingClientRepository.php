<?php


namespace App\Repositories;


use App\Models\SewingClient;

class SewingClientRepository extends BaseRepository implements \App\Contracts\SewingClientContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return SewingClient::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = SewingClient::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return SewingClient::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $sc = $this->findOneById($id);
        $sc->update($data);
        return $sc;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return SewingClient::destroy($id);
    }
}
