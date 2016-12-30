<?php
namespace ThingHiveCore\Models;


class Device extends BaseModel
{
    protected $table = 'devices';

    public function properties()
    {
        return $this->belongsToMany(
            'ThingHiveCore\Models\DeviceProperty',
            'device_property'
        );
    }

    public function blueprint()
    {
        return $this->belongsTo(
            'ThingHiveCore\Models\Blueprint',
            'blueprint_id'
        );
    }
}
