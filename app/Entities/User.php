<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ProjectRepository;
use Illuminate\Foundation\Auth as Authenticatable;

class User extends Authenticatable\User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany(ProjectRepository::class);
    }

    public function members(){
        return $this->belongsToMany(User::class, 'project_members', 'member_id', 'project_id');
    } 
}
