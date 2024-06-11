<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'multimedia', 'text', 'price'];

    public function ownedServices()
    {
        return $this->hasMany(OwnedService::class);
    }

    public function averageRating()
    {
        $ratings = $this->ownedServices()->whereNotNull('valoracion')->pluck('valoracion');
        
        return $ratings->isNotEmpty() ? intval($ratings->average()) : null;
    }

}
