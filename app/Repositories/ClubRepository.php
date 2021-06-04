<?php


namespace App\Repositories;


use App\Models\Club;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Subscription;

class ClubRepository extends BaseRepository implements \App\Contracts\ClubContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id, array $relations = [])
    {
        return Club::with($relations)->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter(int $per_page = 10, array $relations = [], array $scopes = [])
    {
        $query = Club::with($relations)->scopes($scopes)->newQuery();
        return $this->applyFilter($query,$per_page,[
            \App\QueryFilters\Search::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        return Club::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data)
    {
        $club = $this->findOneById($id);
        $club->update($data);

        return $club;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        return Club::destroy($id);
    }

    public function addSub($club_id, array $data)
    {
        $club = $this->findOneById($club_id);
        return $club->subscriptions()->create($data);
    }

    public function updateSub($sub_id, $data)
    {
        $sub = Subscription::findOrFail($sub_id);
        $sub->update($data);
        return $sub;
    }

    public function deleteSub($id)
    {
        Subscription::destroy($id);
    }

    public function addProject($club_id, array $data)
    {
        $club = $this->findOneById($club_id);
        return $club->projects()->create($data);
    }

    public function updateProject($project_id, $data)
    {
        $project = Project::findOrFail($project_id);
        $project->update($data);
        return $project;
    }

    public function deleteProject($id)
    {
        return Project::destroy($id);
    }

    public function addInvoice($club_id, array $data)
    {
        $club = $this->findOneById($club_id);
        return $club->invoices()->create($data);
    }

    public function updateInvoice($invoice_id, $data)
    {
        $i = Invoice::findOrFail($invoice_id);
        $i->update($data);
        return $i;
    }

    public function deleteInvoice($id)
    {
        return Invoice::destroy($id);
    }
}
