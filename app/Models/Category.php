<?php

namespace App\Models;
use App\Models\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion 1 a n de category con subcategories
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es',
    ];
    
    public function subcategories(){
    	return $this->hasMany(Subcategory::class);
    }
}
