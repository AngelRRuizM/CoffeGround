<?php

namespace App;
use App\Product;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id',];

    public function subcategory(){
		return $this->belongsTo(Category::class);
	}

    public function products(){
		return $this->hasMany(Product::class);
	}
}
