<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function clients(){
        return $this->belongsTo(ClientRepository::class);
    }

    public function notes(){
        return $this->hasMany(ProjectNote::class);
    }

    public function members(){
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }

    public function files(){
        return $this->hasMany(ProjectFile::class);
    }
}
