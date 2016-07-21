<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;

use CodeProject\Http\Requests;
use CodeProject\Services\ProjectServices;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(ProjectRepository $repository, ProjectServices $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(){
        return $this->repository->with('users', 'clients')->all();
    }

    public function store(Request $request){
        return $this->service->create($request->all());
    }

    public function show($id){
        return $this->repository->find($id);
    }

    public function destroy($id){
        $this->repository->find($id)->delete();
    }

    public function update(Request $request, $id){
        return $this->service->update($request->all(), $id);
    }
}
