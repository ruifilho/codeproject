<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ClientRepository;
use CodeProject\Services\ClientServices;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $repository;
    private $service;

    public function __construct(ClientRepository $repository, ClientServices $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(){
        return $this->repository->all();
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

    public function update($id, Request $request){
        $client = $this->repository->find($id);
        $client->update($request->all());
        return $client;
    }

}
