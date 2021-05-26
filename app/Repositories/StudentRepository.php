<?php


namespace App\Repositories;


use App\Models\Student;

class StudentRepository extends BaseRepository implements \App\Contracts\StudentContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Student::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Student::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,
            [
                \App\QueryFilters\Search::class,
                \App\QueryFilters\Sort::class,
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Student::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $student = $this->findOneById($id);
        $student->update($data);
        return $student;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        $s = $this->findOneById($id);
        $s->absences()->delete();
        return $s->delete();
    }
}
