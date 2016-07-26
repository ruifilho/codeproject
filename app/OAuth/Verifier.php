<?php
/**
 * Created by PhpStorm.
 * User: rui
 * Date: 23/07/16
 * Time: 14:27
 */

namespace CodeProject\OAuth;
use Illuminate\Support\Facades\Auth;

class Verifier
{
    public function verify($username, $password){

        $credentials = [
            'email' => $username,
            'password' => $password
        ];

        if (Auth::once($credentials)){
            return Auth::user()->id;
        }

        return false;
    }
}