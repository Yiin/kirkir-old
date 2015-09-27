<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model {

    protected $table = 'pets';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
    public function breed()
    {
    	return $this->belongsTo('App\Breed');
    }
    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
}