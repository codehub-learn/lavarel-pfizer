<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\User;
use App\Http\Requests\UsersSkills\StoreRequest;

class UsersSkillsController extends Controller {
    /**
     * Get a specific user skills
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user) {
        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'));
    }

    /**
     * Attach some skills to a user
     *
     * @param StoreRequest $request
     * @param User         $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request, User $user) {
        $user->skills()->sync($request->input('skills'));

        $user->load('skills');

        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'), 201);
    }
}
