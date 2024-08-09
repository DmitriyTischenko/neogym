<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersContact extends Model
{
    use HasFactory;
    protected $table = 'users_contacts';
    protected $guarded = false;
}
