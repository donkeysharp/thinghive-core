<?php
namespace ThingHiveCore\RepoImpl;

use Illuminate\Database\Eloquent\Model;
use ThingHiveCore\Repositories\Repository;


class EloquentRepository implements Repository
{
    protected $model = null;

    public function __construct(Model $model)
    {
        if ($model == null){
            throw new \Exception('Model cannot be null');
        }
        $this->model = $model;
    }

    protected function createPaginator($page=1, $limit=10)
    {
        $paginator = new \stdClass();
        $paginator->items = [];
        $paginator->totalItems = 0;
        $paginator->page = $page;
        $paginator->limit = $limit;

        return $paginator;
    }

    protected function totalItems()
    {
        return $this->model->count();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->get($id);
    }

    public function getByPage($page=1, $limit=10)
    {
        $result = $this->createPaginator($page, $limit);
        $result->items = $this->model
            ->orderBy('id')
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
        $result->totalItems = $this->totalItems();

        return $result;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $item = $this->get($id);
        if ($item == null) {
            return null;
        }

        $item->fill($data);
        $item->save();

        return $item;
    }

    public function delete($id)
    {
        $item = $this->get($id);
        if ($item == null) {
            return false;
        }

        return $item->delete();
    }
}
