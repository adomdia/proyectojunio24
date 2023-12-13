<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends \TCG\Voyager\Models\Post
{
    use HasFactory;
    protected $table = 'posts';

    /**
     * Devuelve el enlace hacia la página.
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute()
    {
        return url('noticias/' . $this->id . '/' . $this->slug);
    }

    /**
     * Devuelve la url hacia la imagen de la página.
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlImageAttribute()
    {
        return asset('storage/' . $this->image);
    }

    /**
     * Devuelve la fecha formateada en Español.
     *
     * @return string
     */
    public function getFechaAttribute()
    {
        $fecha = $this->created_at ?? null;

        if ($fecha) {
            return $fecha->format('d/m/Y');
        }

        return '';
    }

    public function getBodyClean($limit = 250, $final = '...')
    {
        return Str::limit(strip_tags($this->body), $limit, $final);
    }

}
