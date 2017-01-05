<?php
namespace ThingHiveCore;

use Illuminate\Support\ServiceProvider;


class ThingHiveCoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $prefix = 'ThingHiveCore\Core\Repositories';
    }
}
