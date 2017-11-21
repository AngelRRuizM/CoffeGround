<?php

namespace App\Models;
use App\Models\Subcategory;
use App\Models\Image;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion 1 a n de Product con Subcategory
     * La relacion n a n de Product con Image
     * La relacion n a n de Product con Cart
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es', 'price', 'subcategory_id',];

    public function subcategory(){
		return $this->belongsTo(Subcategory::class);
	}

    public function images(){
		return $this->belongsToMany(Image::class);
    }
    
    public function carts(){
		return $this->belongsToMany(Cart::class);
	}
}
