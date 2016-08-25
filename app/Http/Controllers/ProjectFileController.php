<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;

use CodeProject\Http\Requests;
use CodeProject\Services\ProjectService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(ProjectRepository $repository, ProjectService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(){
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    public function store(Request $request){

        $file = $request->file('file');

        if($file != null){
            $extension = $file->getClientOriginalExtension();

            $data['file'] = $file;
            $data['extension'] = $extension;
            $data['name'] = $request->name;
            $data['project_id'] = $request->project_id;
            $data['description'] = $request->description;

            $this->service->createFile($data);
        } else {
            return response(['error' => 'File not present']);
        }

    }

    public function show($id){

        // $userId = \Authorizer::getResourceOwnerId();

        // if($this->repository->isOwner($id, $userId) == false){
        //     return ['success'=>false];
        // }

        if($this->checkProjectPermissions($id) == false){
            return response(['error' => 'Access Forbidden']);
        };

        return $this->service->show($id);

    }

    public function destroy($id){
        $this->repository->find($id)->delete();
    }

    public function update(Request $request, $id){

        if($this->checkProjectOwner($id) == false){
            return response(['error' => 'Access Forbidden']);
        };

        return $this->service->update($request->all(), $id);
    }

    private function checkProjectOwner($projectId){
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId){
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId){
        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)){
            return true;
        }

        return false;
    }
}
