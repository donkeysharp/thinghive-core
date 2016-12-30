<?php
namespace ThingHiveCore\Models;


class Project extends BaseModel
{
    protected $table = 'projects';

    public function blueprints()
    {
        $this->hasMany(
            'ThingHiveCore\Models\Blueprint',
            'project_id'
        );
    }

    public function teams()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\Team',
            'project_id'
        );
    }
}
