<?php

namespace App\Http\Controllers\Admin\Trainer;

use App\Models\Trainer;

class ShowController
{
    public function __invoke($id)
    {
        $trainer = Trainer::find($id);
        if ($trainer) {
            return response()->json($trainer);
        } else {
            return response()->json(['error' => 'Тренер не найден'], 404);
        }
    }

}
