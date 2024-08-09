<?php

namespace App\Http\Controllers\Admin\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TrainerResource;
use App\Models\Trainer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $trainers = Trainer::all();
        return TrainerResource::collection($trainers);
    }
}
