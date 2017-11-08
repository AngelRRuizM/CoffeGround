<?php

namespace App;
use App\Coffee;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',];

    public function coffee(){
		return $this->belongsTo(Coffee::class);
	}
}
