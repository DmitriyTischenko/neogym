<?php

namespace App\Http\Controllers\Admin\Administrators;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);

        return response()->json(['message' => 'Administrator created successfully'], 201);
    }
}

