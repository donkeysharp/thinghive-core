<?php namespace ThingHiveCore\Services;


abstract class BaseService
{
    protected function begin()
    {
        \DB::beginTransaction();
    }

    protected function commit()
    {
        \DB::commit();
    }

    protected function rollback()
    {
        \DB::rollback();
    }

}
