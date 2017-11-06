<?php

namespace App;
use App\Type;
use App\Toast;
use App\CoffeeCategory;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'type_id', 'toast_id', 'coffee_category_id',
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
		return $this->belongsToMany(Presentation::class)->withPivot('price');
	}

    public function images(){
		return $this->belongsToMany(Image::class);
	}
}
