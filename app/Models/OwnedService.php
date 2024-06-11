<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedService extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_id', 'valoracion'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
