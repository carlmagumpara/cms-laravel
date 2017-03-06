<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','body','intro','tags','admin_id','post_image'];


    public function author() {

      return $this->belongsTo('App\Admin', 'admin_id');
    
    }

    public function comments() {

        return $this->hasMany(Comment::class);

    }

    public function likes() {

        return $this->hasMany(Like::class);

    }

}
