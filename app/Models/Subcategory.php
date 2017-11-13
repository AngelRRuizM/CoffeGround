<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
     /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion 1 a n de Category con Subcategory
     * La relacion 1 a n de Subcategory con Product
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es', 'category_id',];

    public function category(){
		return $this->belongsTo(Category::class);
	}

    public function products(){
		return $this->hasMany(Product::class);
	}
}
