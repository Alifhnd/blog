<?php
/**
 * Created by PhpStorm.
 * User: yasna
 * Date: 12/10/18
 * Time: 12:12 PM
 */

namespace Modules\Post\Traits;



use Modules\Post\Entities\Tag;

trait Taggable
{

    /**
     * @return mixed
     */
    public function tags()
    {
        return $this->hasMany(Tag::class , 'taggable');
    }

}