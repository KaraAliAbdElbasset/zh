<?php


namespace App\Repositories;


use App\Models\Invoice;

class InvoiceRepository extends BaseRepository implements \App\Contracts\InvoiceContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Invoice::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Invoice::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Invoice::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $invoice = $this->findOneById($id);
        $invoice->update($data);
        return $invoice;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Invoice::destroy($id);
    }
}
