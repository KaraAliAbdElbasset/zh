<?php


namespace App\Repositories;


use App\Models\Payment;

class PaymentRepository extends BaseRepository implements \App\Contracts\PaymentContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Payment::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Payment::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class,
            \App\QueryFilters\Gender::class,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Payment::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $payment = $this->findOneById($id);
        $payment->update($data);
        return $payment;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        $t = $this->findOneById($id);
        return $t->delete();
    }
}
