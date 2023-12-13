<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends \TCG\Voyager\Models\Page
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = ['body'];
    ## Slugs de páginas excluidas al mostrar todas
    public static $excludedPages = [
        'politica-de-privacidad',
    ];

    /**
     * Devuelve el enlace hacia la página.
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute()
    {
        return url('pagina/' . $this->slug);
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

    public static function all($columns = ['*'])
    {
        $pages = parent::all();

        return $pages->whereNotIn('slug', self::$excludedPages);
    }
}
