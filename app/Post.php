<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    // some default implicit values you can override:

    // protected $table = 'posts';
    // public $primaryKey = 'id';
    // public $timestamps = true;

    // creating relation
    public function user() {
        return $this->belongsTo('App\User');
    }
}
