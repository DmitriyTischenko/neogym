<?php

namespace App\Http\Controllers\Admin\GymInfo;

use App\Models\GymInfo;
use App\Models\Trainer;

class ShowController
{
    public function __invoke($id)
    {
        $gymInfo = GymInfo::find($id);
        if ($gymInfo) {
            return response()->json($gymInfo);
        } else {
            return response()->json(['error' => 'Тренер не найден'], 404);
        }
    }

}
