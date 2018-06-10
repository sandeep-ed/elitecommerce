<?php

	namespace App;
	use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
	class Category extends Eloquent
	{

	
        public $fillable = ['parent','category', 'slug'];

	    /**
	     * Get the index name for the model.
	     *
	     * @return string
	    */
	    public function childs() {
	        return $this->hasMany('App\Category','parent','id') ;
	    }
	}
