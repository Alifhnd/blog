<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    protected $fillable = ['title'];



    /**
     * asdasdasd
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class , 'post_tags' );
    }


}
