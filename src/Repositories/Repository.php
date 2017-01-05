<?php
namespace ThingHiveCore\Repositories;


interface Repository
{
    public function all();
    public function get($id);
    public function getByPage($page=1, $limit=10);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
