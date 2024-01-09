<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageContent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','foreign_id', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function foreignUser()
    {
        return $this->belongsTo(User::class, 'foreign_id');
    }
}
