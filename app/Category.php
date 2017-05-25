<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	
	public $timestamps = false;
	public $fillable = ['category', 'category_id'];

	public function author()
    {
    	return $this->belongsTo('App\Author');
    }

    public function subcategory()
    {
        return $this->hasMany('App\Category');
    }

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

}

    
