<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesContent extends Model
{
    use HasFactory;

    protected $fillable = ['user_1', 'user_2', 'status'];
}
