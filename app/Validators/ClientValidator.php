<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 16/07/16
 * Time: 13:41
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required | max:255',
        'responsible' => 'required | max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'adress' => 'required'
    ];
}