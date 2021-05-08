<?php


namespace App\Repositories;


class GeneralStatisticRepository extends BaseRepository implements \App\Contracts\GeneralStatisticContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        // TODO: Implement findOneById() method.
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        // TODO: Implement findByFilter() method.
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
