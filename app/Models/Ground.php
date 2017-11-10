<?php

namespace App;
use App\Presentation;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion n a 1 de Ground con Presentation
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'description_en', 'name_es', 'description_es', ];

    public function presentations(){
		return $this->hasMany(Presentation::class);
	}
}
