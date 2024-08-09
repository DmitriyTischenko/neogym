<?php

namespace App\Http\Controllers\Admin\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $user = Trainer::findOrFail($id);
        $user->delete();
    }
}
