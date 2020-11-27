<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;

class DepartmentsController extends Controller
{
    /**
     * Return a list of departments
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $departments = DepartmentResource::collection(Department::all());

        return response()->json(compact('departments'));
    }

    /**
     * Show a department's details
     *
     * @param Department $department
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Department $department) {
        $department = new DepartmentResource($department);

        return response()->json(compact('department'));
    }

    /**
     * Create a new department
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) {
        $department = Department::create($request->only('title', 'manager_id'));

        return response()->json(['department' => new DepartmentResource($department)], 201);
    }

    /**
     * Update a department
     *
     * @param Department    $department
     * @param UpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse]
     */
    public function update(Department $department, UpdateRequest $request) {
        $department->update($request->only('title', 'manager_id'));

        return response()->json(null, 204);
    }

    /**
     * Delete a department
     *
     * @param Department $department
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Department $department) {
        $department->delete();

        return response()->json(null, 204);
    }
}
