<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    protected $table = 'types';

    protected $fillable = ['name'];

    public function getName() {
    	return $this->name;
    }

    public function breeds()
    {
        return $this->hasMany('App\Breed');
    }
}