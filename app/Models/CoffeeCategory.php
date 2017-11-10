<?php

namespace App;
use App\Coffee;

use Illuminate\Database\Eloquent\Model;

class CoffeeCategory extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion n a 1 de Type con Coffe
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es', ];

    public function coffees(){
		return $this->hasMany(Coffee::class);
	}
}
