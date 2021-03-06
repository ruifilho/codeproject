<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 22:25
 */

namespace CodeProject\Repositories;


use CodeProject\Entities\Project;
use CodeProject\Presenters\ProjectPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

    public function isOwner($projectId, $userId){
        if(count($this->findWhere(['id'=>$projectId, 'owner_id'=> $userId]))){
            return true;
        }
        
        return false;
    }

    public function hasMember($projectId, $memberId){
        $project = $this->find($projectId);
        
        foreach($project->members as $member){
            if ($member->id == $memberId) {
                return true;
            }
        }

        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }
}