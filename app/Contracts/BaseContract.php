<?php


namespace App\Contracts;


interface BaseContract
{

    /**
     * @param $id
     * @param array $relations
     * @return mixed
     */
    public function findOneById($id,array $relations = []);

    /**
     * @param int $per_page
     * @param array $relations
     * @param array $scopes
     * @return mixed
     */
    public function findByFilter(int $per_page = 10 , array $relations = [],array $scopes = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id,array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
