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
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        $products = collect($data['products']);
        $data['amount'] = $products->sum('total');
        $order = Order::create($data);
        $order->products()->create($products->all());
        return $order;
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $order = $this->findOneById($id,['products']);
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
}
