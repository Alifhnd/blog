<?php

namespace Modules\Post\Entities;

use App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Modules\Post\Traits\Taggable;

class Post extends Model
{

    use  Taggable;

    protected $guarded    = ['post_id'];
    protected $primaryKey = 'post_id';

    const PUBLISHED = 1;
    const FUTURE    = 2;
    CONST DRAFT     = 3;
    CONST PENDING   = 4;



    /**
     * relation for User Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'post_author');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class , 'post_tags' , 'post_id');
    }

    /**
     *  mutator for post slug
     *
     * @param $value
     */
    public function setPostSlugAttribute($value)
    {
        $this->attributes['post_slug'] = preg_replace('/\s+/', '-', $value);
    }



    /**
     * get an array of post status
     *
     * @param int|null $status
     *
     * @return array
     */
    public static function postStatuses(int $status = null)
    {
        $statuses = [
             self::DRAFT     => 'پیشنویس',
             self::FUTURE    => 'زمانبدی',
             self::PENDING   => 'بازبینی',
             self::PUBLISHED => 'منتشر شده',
        ];

        if (!is_null($statuses) && in_array($status, array_keys($statuses))) {
            return $statuses[$status];
        }
        return $statuses;
    }



    /**
     * create new post and return this
     *
     * @param $request
     *
     * @return mixed
     */
    public function storePost($request)
    {

        $post = Post::create([
             'post_title'   => $request->input('postTitle'),
             'post_slug'    => $request->input('postTitle'),
             'post_content' => $request->input('postContent'),
             'post_author'  => User::first()->id,
             'post_status'  => $request->input('postStatus'),

        ]);



        return $post;
    }


}
