<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectNoteRepository;

use CodeProject\Http\Requests;
use CodeProject\Services\ProjectNoteService;

use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id){
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function store(Request $request){
        return $this->service->create($request->all());
    }

    public function show($id, $noteId){
        return $this->repository->findWhere(['project_id'=> $id, 'id'=>$noteId]);
    }

    public function destroy($id, $noteId){
        $this->repository->find($id)->delete();
    }

    public function update(Request $request, $id, $noteId){
        return $this->service->update($request->all(), $id);
    }
}
