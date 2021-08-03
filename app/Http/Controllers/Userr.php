<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Userr extends Controller
{
    //
    public function api()
    {
        return User::all();
    }
}
