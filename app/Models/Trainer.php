<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = 'trainers';
    protected $guarded = false;

    public function getImageUrlAttribute() {
        return url('storage/' . $this->photo);
    }
}
