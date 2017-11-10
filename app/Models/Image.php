<?php

namespace App;
use App\Coffee;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion n a n de Image con Coffee
     * La relacion n a n de Image con Product
     *
     * @var array
     */
    protected $fillable = [
        'path', 'name', ];

    public function coffees(){
		return $this->belongsToMany(Coffee::class);
	}

    public function products(){
		return $this->belongsToMany(Product::class);
	}
}
