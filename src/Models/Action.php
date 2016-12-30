<?php
namespace ThingHiveCore\Models;


class Action extends BaseModel
{
    protected $table = 'actions';

    public function parameters()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\Parameter',
            'action_id'
        );
    }
}
