<?php

namespace App\Http\Controllers\Admin\UserContact;

use App\Http\Controllers\Controller;
use App\Models\UsersContact;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $usersContact = UsersContact::findOrFail($id);
        $usersContact->delete();
    }
}

