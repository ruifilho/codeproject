<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 22:04
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required | max:255',
        'description' => 'required | max:255',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required'
    ];
}