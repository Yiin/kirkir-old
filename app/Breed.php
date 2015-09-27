<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {

    protected $table = 'breeds';

    protected $fillable = ['name'];

    public function getName() {
    	return $this->name;
    }

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }
    public function pets()
    {
    	return $this->hasMany('App\Pet');
    }
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}