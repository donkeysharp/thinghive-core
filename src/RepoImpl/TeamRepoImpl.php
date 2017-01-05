<?php namespace ThingHiveCore\RepoImpl;

use ThingHiveCore\Repositories\TeamRepository;


class TeamRepoImpl extends EloquentRepository implements TeamRepository
{
    public function create(array $data)
    {
        $team = new Team($data);
        $team->save();

        return $team;
    }

    public function setPermissions(Team $team, array $permissionIds)
    {
        $team->permissions()->sync($permissionIds);
    }

    public function addMember(Team $team, $userId)
    {
        $team->users()->attach($userId);
    }
}
