<?php

namespace App\Models;
use App\Models\Prsentation;
use App\Models\Product;
use App\Models\Auth\User\User;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion n a 1 de Cart con user
     * La relacion n a n de Cart con Presentation
     * La relacion n a n de Cart con Product
     * 
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function presentations(){
        return $this->belongsToMany(Presentation::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
