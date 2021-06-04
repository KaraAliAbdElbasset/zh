<?php


namespace App\Repositories;


use App\Models\Order;

class OrderRepository extends BaseRepository implements \App\Contracts\OrderContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Order::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Order::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        $data['amount'] = $this->getAmount($data['products']);
        return Order::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $order = $this->findOneById($id);
        $data['amount'] = $this->getAmount($data['products']);
        $order->update($data);
        return $order;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Order::destroy($id);
    }

    /**
     * @param array $products
     */
    private function getAmount(array $products)
    {
        return collect($products)->sum('total');
    }
}
