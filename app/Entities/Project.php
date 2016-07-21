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
}
