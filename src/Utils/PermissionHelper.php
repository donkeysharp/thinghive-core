<?php namespace ThingHiveCore\Utils;

class PermissionHelper
{
    // Project permissions
    const PROJECT_CREATE = 1;
    const PROJECT_READ = 2;
    const PROJECT_UPDATE = 3;
    const PROJECT_DELETE = 4;

    // Blueprint permissions
    const BLUEPRINT_CREATE = 11;
    const BLUEPRINT_READ = 12;
    const BLUEPRINT_UPDATE = 13;
    const BLUEPRINT_DELETE = 14;

    // Device permissions
    const DEVICE_CREATE = 21;
    const DEVICE_READ = 22;
    const DEVICE_UPDATE = 23;
    const DEVICE_DELETE = 24;

    // Team permissions
    const TEAM_CREATE = 31;
    const TEAM_READ = 32;
    const TEAM_UPDATE = 33;
    const TEAM_DELETE = 34;

    public static function getAll()
    {
        return [
            self::PROJECT_CREATE,
            self::PROJECT_READ,
            self::PROJECT_UPDATE,
            self::PROJECT_DELETE,
            self::BLUEPRINT_CREATE,
            self::BLUEPRINT_READ,
            self::BLUEPRINT_UPDATE,
            self::BLUEPRINT_DELETE,
            self::DEVICE_CREATE,
            self::DEVICE_READ,
            self::DEVICE_UPDATE,
            self::DEVICE_DELETE,
            self::TEAM_CREATE,
            self::TEAM_READ,
            self::TEAM_UPDATE,
            self::TEAM_DELETE,
        ];
    }

    public static function getAllReadOnly()
    {
        return [
            self::BLUEPRINT_READ,
            self::DEVICE_READ,
            self::TEAM_READ,
        ];
    }
}
