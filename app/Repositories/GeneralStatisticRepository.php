<?php


namespace App\Repositories;


use App\Models\GeneralStatistic;

class GeneralStatisticRepository extends BaseRepository implements \App\Contracts\GeneralStatisticContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return GeneralStatistic::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query =  GeneralStatistic::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return GeneralStatistic::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $g = $this->findOneById($id);
        return $g->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return GeneralStatistic::destroy($id);
    }
}
