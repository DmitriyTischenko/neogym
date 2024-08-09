<?php

namespace App\Http\Controllers\Main\UsersContact;

use App\Http\Requests\UserContact\StoreRequest;
use App\Models\UsersContact;

class StoreController
{
    public function __invoke (StoreRequest $request, UsersContact $usersContact)
    {
        $data = $request->validated();

        UsersContact::create($data);

        return response()->json(['message' => 'Данные успешно отправлены!']);
    }
}
