<?php

namespace App\Http\Controllers\Admin\GymInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymInfo\UpdateRequest;
use App\Models\GymInfo;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $gymInfo = GymInfo::find($id);

        if (!$gymInfo) {
            return response()->json(['message' => 'Gym info not found'], 404);
        }

        $validatedData = $request->validated();
        $gymInfo->update($validatedData);

        $updatedGymInfo = $gymInfo->fresh();

        return response()->json([
            'location' => $updatedGymInfo->location,
            'phone_number' => $updatedGymInfo->phone_number,
            'email' => $updatedGymInfo->email,
        ]);
    }
}
