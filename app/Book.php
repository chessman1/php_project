<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
	
	public $timestamps = false;
	public $fillable = ['name', 'author_id', 'pic'];

	public function author()
    {
    	return $this->belongsTo('App\Author');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    

}
