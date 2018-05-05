<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    public function lang() {
    	return $this->belongsTo('App\Lang');
    }
}
