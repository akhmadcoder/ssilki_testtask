<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
        'link', 
        'url',
    ];

}
