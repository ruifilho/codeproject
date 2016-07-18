<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function clients(){
        return $this->belongsTo(ClientRepository::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
