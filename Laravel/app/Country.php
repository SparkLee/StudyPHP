<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    /**
     * 关联：Has Many Through 远层一对多关联
     */
	public function counties() {
	    return $this->hasManyThrough('App\County', 'App\City', 'country_id', 'city_id');
	}

}
