<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = [
            'John Doe',
            'Jane Doe'
        ];
        $count = count($users);

        return compact('users', 'count');
    }
}
