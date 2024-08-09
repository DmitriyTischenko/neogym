<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymInfo extends Model
{
    use HasFactory;
    protected $table = 'gym_infos';
    protected $guarded = false;
}
