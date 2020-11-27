<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacationResource;
use App\Models\User;
use App\Models\Vacation;
use App\Http\Requests\UsersVacations\StoreRequest;
use App\Http\Requests\UsersVacations\UpdateRequest;

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

        $vacations = VacationResource::collection($user->vacations);

        return response()->json(compact('vacations'));
    }

    /**
     * Show a user's vacation details
     *
     * @param User     $user
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user, Vacation $vacation) {
        $vacation = new VacationResource($vacation);

        return response()->json(compact('vacation'));
    }

    /**
     * Attach a new vacation to a user
     *
     * @param User         $user
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(User $user, StoreRequest $request) {
        $user->vacations()->create($request->only('from', 'to'));

        return response()->json(null, 201);
    }

    /**
     * Update a user's vacation
     *
     * @param User          $user
     * @param Vacation      $vacation
     * @param UpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(User $user, Vacation $vacation, UpdateRequest $request) {
        $vacation->update($request->only('from', 'to'));

        return response()->json(null, 204);
    }

    /**
     * Delete a user's vacation
     *
     * @param User     $user
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user, Vacation $vacation) {
        $vacation->delete();

        return response()->json(null, 204);
    }
}
