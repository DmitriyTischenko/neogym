<?php

namespace App\Http\Controllers\Admin\UserContact;

use App\Http\Controllers\Controller;
use App\Models\UsersContact;

class IndexController extends Controller
{
    public function __invoke(UsersContact $usersContact)
    {
        $usersContacts = UsersContact::paginate(7);
        return response()->json($usersContacts);
    }
}
