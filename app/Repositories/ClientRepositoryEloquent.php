<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 14/07/16
 * Time: 23:10
 */

namespace CodeProject\Repositories;


use CodeProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository
{
    public function model()
    {
        return Client::class;
    }
}