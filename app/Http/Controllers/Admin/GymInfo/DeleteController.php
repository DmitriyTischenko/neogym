<?php

namespace App\Http\Controllers\Admin\GymInfo;

use App\Http\Controllers\Controller;
use App\Models\GymInfo;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $gymInfo = GymInfo::findOrFail($id);
        $gymInfo->delete();
    }
}
