<?php


namespace App\Repositories;


use App\Models\SewingWorker;

class SewingWorkerRepository extends BaseRepository implements \App\Contracts\SewingWorkerContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
       return SewingWorker::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = SewingWorker::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return SewingWorker::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $sw = $this->findByFilter($id);
        $sw->update($data);
        return $sw;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return SewingWorker::destroy($id);
    }
}
