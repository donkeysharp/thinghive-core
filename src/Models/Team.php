<?php
namespace ThingHiveCore\Models;


class Team extends BaseModel
{
    protected $table = 'teams';


    public function users()
    {
        return $this->belongsToMany(
            'ThingHiveCore\Models\User',
            'user_team'
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(
            'ThingHiveCore\Models\Permissions',
            'team_perm'
        );
    }
}
