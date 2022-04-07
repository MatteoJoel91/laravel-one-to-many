<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts() {
        
       return $this->hasMany('App\Post'); /* namespace App; in model Post.php e poi il nome del model in questo caso Post */

    }
}
