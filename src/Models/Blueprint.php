<?php
namespace ThingHiveCore\Models;


class Blueprint extends BaseModel
{
    protected $table = 'blueprints';

    public function project()
    {
        return $this->belongsTo(
            'ThingHiveCore\Models\Project',
            'project_id'
        );
    }

    public function devices()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\Device',
            'blueprint_id'
        );
    }

    public function dataFeeds()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\DataFeed',
            'blueprint_id'
        );
    }

    public function actions()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\Action',
            'blueprint_id'
        );
    }

    public function feedViews()
    {
        return $this->hasMany(
            'ThingHiveCore\Core\FeedView',
            'blueprint_id'
        );
    }

    public function properties()
    {
        return $this->hasMany(
            'ThingHiveCore\Models\DeviceProperty',
            'blueprint_id'
        );
    }
}
