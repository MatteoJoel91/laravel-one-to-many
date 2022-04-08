<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function category() {

        return $this->belongsTo('App\Category'); /* namespace App; in model Post.php e poi il nome del model in questo caso Category */
        
    }

    // public function posts(){
    //     return $this->belongsToMany('App\Post');
    // }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
