<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{
    protected $table = 'twitter_users';

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'keywords_twitter_users');
    }

    public function plan() {
    	return $this->belongsTo('App\Plan');
    }

    public function lang() {
    	return $this->belongsTo('App\Lang');
    }
}
