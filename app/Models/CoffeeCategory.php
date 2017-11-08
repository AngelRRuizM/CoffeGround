<?php

namespace App;
use App\Coffee;

use Illuminate\Database\Eloquent\Model;

class CoffeeCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', ];

    public function coffees(){
		return $this->hasMany(Coffee::class);
	}
}
