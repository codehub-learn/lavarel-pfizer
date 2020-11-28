<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;

class DepartmentsManagersController extends Controller {
    /**
     * Associate a department with a user
     *
     * @param Department $department
     * @param User       $manager
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Department $department, User $manager) {
        $department->manager()->associate($manager);
        $department->save();

        return response()->json(null, 204);
    }

    /**
     * Disassociate a department from a user
     *
     * @param Department $department
     * @param User       $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Department $department, User $user) {
        $department->manager()->disassociate();
        $department->save();

        return response()->json(null, 204);
    }
}
