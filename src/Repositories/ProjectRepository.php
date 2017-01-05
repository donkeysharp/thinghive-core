<?php namespace ThingHiveCore\Repositories;

use ThingHiveCore\Models\Project;


interface ProjectRepository
{
    public function get($projectId, $userId);
    public function getByPage($page=1, $limit=10, $userId);
    public function create(array $data);
    public function update(Project $project, array $data);
}
