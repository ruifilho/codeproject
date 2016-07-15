<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Entities\Client;
use CodeProject\Repositories\ClientRepositoryEloquent;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;

class ClientController extends Controller
{
    public function index(ClientRepositoryEloquent $repository){
        return $repository->all();
    }

    public function store(Request $request){
        return Client::create($request->all());
    }

    public function show($id){
        return Client::find($id);
    }

    public function destroy($id){
        Client::find($id)->delete();
    }

    public function update($id, Request $request){
        $client = Client::find($id);
        $input = $request->all();
        $client->update($input);
        return $client;
    }

}
