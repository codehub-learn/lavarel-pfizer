<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        $count = count($users);

        return compact('users', 'count');
    }

    public function show($id) {
        $user = User::findOrFail($id);

        return compact('user');
    }
}
