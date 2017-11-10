<?php

namespace App;
use App\Coffee;
use App\Ground;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion 1 a n de Presentation con Coffee
     * La relacion 1 a n de Presentation con Ground
     *
     * @var array
     */
    protected $fillable = [
        'weight', 'ground_id', 'coffee_id',];

    public function ground(){
		return $this->belongsTo(Ground::class);
	}

    public function coffee(){
		return $this->belongsTo(Coffee::class);
	}
}
