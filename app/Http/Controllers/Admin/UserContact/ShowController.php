<?php

namespace App\Http\Controllers\Admin\UserContact;

use App\Models\UsersContact;

class ShowController
{
    public function __invoke()
    {
        $usersContacts = UsersContact::paginate(7);
        return view('admin.index', compact('usersContacts'));
    }
}
