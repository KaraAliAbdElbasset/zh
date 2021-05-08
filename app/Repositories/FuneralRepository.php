<?php


namespace App\Repositories;


use App\Models\Funeral;

class FuneralRepository extends BaseRepository implements \App\Contracts\FuneralContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Funeral::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Funeral::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Funeral::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $f = $this->findOneById($id);
        return $f->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Funeral::destroy($id);
    }
}
