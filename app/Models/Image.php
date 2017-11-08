<?php

namespace App;
use App\Coffee;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'name', ];

    public function coffees(){
		return $this->belongsToMany(Coffee::class);
	}

    public function products(){
		return $this->belongsToMany(Product::class);
	}
}
