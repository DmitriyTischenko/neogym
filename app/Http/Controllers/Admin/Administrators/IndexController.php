<?php

namespace App\Http\Controllers\Admin\Administrators;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminResource;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::paginate(7);
        return AdminResource::collection($users);
    }
}
