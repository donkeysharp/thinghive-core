<?php namespace ThingHiveCore\Services;

use ThingHiveCore\Utils\PermissionHelper as Perm;
use ThingHiveCore\Repositories\ProjectRepository;
use ThingHiveCore\Repositories\TeamRepository;
use ThingHiveCore\NotFoundException;


class ProjectService extends BaseService
{
    public function __construct(
        ProjectRepository $projectRepo,
        TeamRepository $teamRepo)
    {
        $this->projectRepo = $projectRepo;
        $this->teamRepo = $teamRepo;
    }

    public function get($projectId, $userId)
    {
        $project = $this->projectRepo->get($projectId, $userId);
        if ($project == null) {
            throw new NotFoundException("Project $projectId not found for user $userId");
        }

        return $project;
    }

    public function getPaginated($page=1, $limit=10, $userId)
    {
        return $this->projectRepo->getByPage($page, $limit, $userId);
    }

    public function create($data, $userId)
    {
        $prject = null;

        parent::begin();
        try {
            $project = $this->projectRepo->create($data);

            /*
             * Create default teams
             */
            $adminTeam = $this->teamRepo->create([
                'name' => 'Admins',
                'description' => 'Admin Team',
                'can_delete' => false,
                'project_id' => $project->id
            ]);

            $guestTeam = $this->teamRepo->create([
                'name' => 'Guests',
                'description' => 'Guest Team',
                'can_delete' => false,
                'project_id' => $project->id
            ]);

            // Setup default teams
            $teamRepo->setPermissions($adminTeam, Perm::getAll());
            $teamRepo->setPermissions($guestTeam, Perm::getAllReadOnly());
            $teamRepo->addMember($adminTeam, $userId);

            parent::commit();
        } catch(Exception $e) {
            parent::rollback();
            throw $e;
        }

        return $project;
    }

    public function update($projectId, array $data, $userId)
    {
        $project = $this->get($projectId, $userId);

        return $this->projectRepo->update($project, $data);
    }
}
