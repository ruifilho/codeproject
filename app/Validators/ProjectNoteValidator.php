<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 22:04
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required|date'
    ];
}