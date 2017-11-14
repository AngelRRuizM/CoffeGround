<?php

namespace App\Models;
use App\Models\Type;
use App\Models\Toast;
use App\Models\CoffeeCategory;
use App\Models\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion n a 1 de Type con Coffe
     * La relacion n a 1 de Toast con Coffe
     * La relacion n a 1 de CoffeCategory con Coffe
     * La relacion 1 a n de Coffe con Toast
     * La relacion n a n de Image con Coffe
     * 
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es', 'type_id', 'toast_id', 'coffee_category_id', 
    ];
    
    public function type(){
    	return $this->belongsTo(Type::class);
    }

    public function toast(){
    	return $this->belongsTo(Toast::class);
    }

    public function coffeeCategory(){
    	return $this->belongsTo(CoffeeCategory::class);
    }

    public function presentations(){
		return $this->hasMany(Presentation::class);
	}

    public function images(){
		return $this->belongsToMany(Image::class);
	}
}
