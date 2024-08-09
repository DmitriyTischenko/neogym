<?php

namespace App\Http\Controllers\Admin\Administrators;

use App\Http\Controllers\Controller;
use App\Models\GymInfo;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
