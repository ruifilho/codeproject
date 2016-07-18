<?php

namespace CodeProject\Entities;

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
        return $this->hasMany(Project::class);
    }
}
