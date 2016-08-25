<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'extension'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
