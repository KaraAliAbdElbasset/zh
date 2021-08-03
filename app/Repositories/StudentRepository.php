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
                \App\QueryFilters\Gender::class,
                \App\QueryFilters\Type::class,
                \App\QueryFilters\MemorizingLevel::class,
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        $student = Student::create($data);
        $student->groups()->attach($data['group']);
        return $student;
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $student = $this->findOneById($id);
        $student->update($data);
        $student->groups()->sync($data['group']);
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
