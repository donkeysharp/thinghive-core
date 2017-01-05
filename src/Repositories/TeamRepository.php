<?php namespace ThingHiveCore\Repositories;

use ThingHiveCore\Models\Team;

interface TeamRepository
{
    public function create(array $data);
    public function setPermissions(Team $team, array $permissionIds);
    public function addMember(Team $team, $userId);
}
