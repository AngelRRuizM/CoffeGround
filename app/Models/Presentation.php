<?php

namespace App;
use App\Coffee;
use App\Ground;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight', 'ground_id', ];

    public function ground(){
		return $this->belongsTo(Ground::class);
	}

    public function coffees(){
		return $this->belongsToMany(Coffee::class);
	}
}
