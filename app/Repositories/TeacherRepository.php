<?php


namespace App\Repositories;


use App\Models\Teacher;
use Carbon\Carbon;

class TeacherRepository extends BaseRepository implements \App\Contracts\TeacherContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Teacher::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Teacher::with($relations)->scopes($scopes)->newQuery();
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
        return Teacher::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $teacher = $this->findOneById($id);
        $teacher->update($data);
        return $teacher;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        $t = $this->findOneById($id);
        $t->absences()->delete();
        return $t->delete();
    }

    public function addPayment($id, array $data)
    {
        $teacher = $this->findOneById($id);
        $data['month'] = Carbon::parse($data['month'])->setDay(1);
        $payment = $teacher->payments()->where('month', $data['month'])->first();

        if ($payment)
        {
            return false;
        }

        $teacher->payments()->create($data);
        return true;
    }

    public function deletePayment($id, $payment_id)
    {
        $teacher = $this->findOneById($id);
        $payment = $teacher->payments()->findOrFail($payment_id);
        return $payment->delete();
    }
}
