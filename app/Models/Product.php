<?php

namespace App;
use App\Subcategory;
use App\Image;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'subcategory_id',];

    public function subcategory(){
		return $this->belongsTo(Subcategory::class);
	}

    public function images(){
		return $this->belongsToMany(Image::class);
	}
}
