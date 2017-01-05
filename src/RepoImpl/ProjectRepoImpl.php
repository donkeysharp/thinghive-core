<?php namespace ThingHiveCore\RepoImpl;

use ThingHiveCore\Repositories\ProjectRepository;


class ProjectRepoImpl extends EloquentRepository implements ProjectRepository
{

    public function get($projectId, $userId)
    {
        $project = Project::join('teams as t', 'projects.id', '=', 't.project_id')
            ->join('user_team as ut', 'ut.team_id', '=', 't.id')
            ->where('projects.id', '=', $projectId)
            ->where('ut.user_id', '=', $userId)
            ->get(['projects.*'])->first();

        return $project;
    }

    public function getByPage($page=1, $limit=10, $userId)
    {
        $query = Project::join('teams as t', 't.project_id', '=', 'projects.id')
            ->join('user_team as ut', 'ut.team_id', '=', 't.id')
            ->orderBy('projects.id');

        $result = parent::makePaginator($page, $limit);
        $result->items = $query
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->where('ut.user_id', '=', '$userId')
            ->get(['projects.*']);

        $result->totalItems = $query->count();
        return $result;
    }

    public function create(array $data)
    {
        $item = new Project($data);
        $item->save();

        return $item;
    }

    public function update(Project $project, array $data)
    {
        unset($data['id']);

        $project->fill();
        $project->save();

        return $project;
    }
}
