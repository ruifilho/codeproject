<?php

namespace CodeProject\Entities;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'project_id',
        'member_id',
    ];

}
