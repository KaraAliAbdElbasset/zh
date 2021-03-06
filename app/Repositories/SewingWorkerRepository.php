<?php


namespace App\Repositories;


use App\Models\SewingWorker;
use Carbon\Carbon;

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
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class,
            \App\QueryFilters\Gender::class
        ]);
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
        $sw = $this->findOneById($id);
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

    public function addPayment($id, array $data)
    {
        $sw = $this->findOneById($id);
        $data['month'] = Carbon::parse($data['month'])->setDay(1);
        $payment = $sw->payments()->where('month', $data['month'])->first();

        if ($payment)
        {
            return false;
        }

        $sw->payments()->create($data);
        return true;
    }

    public function deletePayment($id, $payment_id)
    {
        $sw = $this->findOneById($id);
        $payment = $sw->payments()->findOrFail($payment_id);
        return $payment->delete();
    }
}
