<?php


namespace App\Contracts;


interface SewingWorkerContract extends BaseContract
{
    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function addPayment($id, array $data);

    /**
     * @param $id
     * @param $payment_id
     * @return mixed
     */
    public function deletePayment($id, $payment_id);
}
