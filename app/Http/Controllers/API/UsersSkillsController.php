<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersSkillsController extends Controller
{
    public function index($id) {
        $user = User::with('skills')->findOrFail($id);

        return response()->json([
            'skills' => $user->skills
        ]);
    }
}
