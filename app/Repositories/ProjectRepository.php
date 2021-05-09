<?php


namespace App\Repositories;


use App\Models\Project;

class ProjectRepository extends BaseRepository implements \App\Contracts\ProjectContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Project::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Project::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Project::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $project = $this->findOneById($id);
        $project->update($data);
        return $project;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Project::destroy($id);
    }
}
