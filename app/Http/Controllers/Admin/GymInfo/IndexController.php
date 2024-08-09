<?php

namespace App\Http\Controllers\Admin\GymInfo;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\GymInfoResource;
use App\Models\GymInfo;

class IndexController extends Controller
{
    public function __invoke()
    {
        $gymInfos = GymInfo::all();
        return GymInfoResource::collection($gymInfos);
    }
}
