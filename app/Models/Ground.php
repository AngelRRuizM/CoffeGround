<?php

namespace App;
use App\Presentation;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', ];

    public function presentatios(){
		return $this->hasMany(Presentation::class);
	}
}
