<?php

namespace App\Models;
use App\Models\Coffee;
use App\Models\Ground;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    /**
     * Modelo que representa las realciones de la base de datos, en este caso se refleja:
     * La relacion 1 a n de Presentation con Coffee
     * La relacion 1 a n de Presentation con Ground
     * La relacion n a n de Presentation con Cart
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
    
    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
