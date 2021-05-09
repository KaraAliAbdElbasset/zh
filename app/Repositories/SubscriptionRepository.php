<?php


namespace App\Repositories;


use App\Models\Subscription;

class SubscriptionRepository extends BaseRepository implements \App\Contracts\SubscriptionContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Subscription::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Subscription::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Subscription::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $s = $this->findOneById($id);
        $s->update($data);
        return $s;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Subscription::destroy($id);
    }
}
