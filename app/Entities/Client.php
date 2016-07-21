<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'name',
      'responsible',
      'email',
      'phone',
      'adress',
      'obs'
    ];

    public function projects(){
        return $this->hasMany(ProjectRepository::class);
    }
}
