<?php

namespace App;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
    
    public function subcategories(){
    	return $this->hasMany(Subcategory::class);
    }
}
