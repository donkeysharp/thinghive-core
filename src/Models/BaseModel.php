<?php

namespace ThingHiveCore\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'id' => 'int'
    ];
}
