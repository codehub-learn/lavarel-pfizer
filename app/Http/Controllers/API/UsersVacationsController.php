<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UsersSkills\StoreRequest;

class UsersVacationsController extends Controller {
    /**
     * Get a specific user's vacations
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user) {
        $user->load('vacations');

        return response()->json([
            'vacations' => $user->vacations,
        ]);
    }
}
