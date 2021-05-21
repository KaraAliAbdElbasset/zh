<?php


namespace App\Contracts;


interface ClubContract extends BaseContract
{
    /**
     * @param $club_id
     * @param array $data
     * @return mixed
     */
    public function addSub($club_id, array $data);

    /**
     * @param $sub_id
     * @param $data
     * @return mixed
     */
    public function updateSub($sub_id,$data);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteSub($id);

    /**
     * @param $club_id
     * @param array $data
     * @return mixed
     */
    public function addProject($club_id, array $data);

    /**
     * @param $project_id
     * @param $data
     * @return mixed
     */
    public function updateProject($project_id,$data);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteProject($id);

    /**
     * @param $club_id
     * @param array $data
     * @return mixed
     */
    public function addInvoice($club_id, array $data);

    /**
     * @param $invoice_id
     * @param $data
     * @return mixed
     */
    public function updateInvoice($invoice_id,$data);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteInvoice($id);

}
