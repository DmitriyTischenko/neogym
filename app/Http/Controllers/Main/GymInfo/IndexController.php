<?php

namespace App\Http\Controllers\Main\GymInfo;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\GymInfoResource;
use App\Models\GymInfo;
use App\Models\Trainer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $trainers = GymInfo::all();
        return GymInfoResource::collection($trainers);
    }
}
