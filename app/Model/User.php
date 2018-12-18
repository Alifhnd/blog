<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Post\Entities\Post;

class User extends Authenticatable
{
    use Notifiable;

    const CHIEF_EDITOR = 3;
    const ADMIN = 2;
    const AUTHOR = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class , 'post_author');
    }

    /**
     *
     * @return array
     */

    public static function getUserRole()
    {
        return[
            self::AUTHOR => trans('message.author_user'),
            self::CHIEF_EDITOR => trans('message.edit_user'),
            self::ADMIN => trans('message.admin_user')
        ];
    }

    /**
     * create user
     * @param $request
     * @return mixed
     */

    public function createUser($request)
    {
        $user = User::create([
            'name'=>$request->input('userFullName'),
            'email'=>$request->input('userEmail'),
            'password'=>$request->input('password'),
            'role'=>$request->input('userRole'),
        ]);
        return $user;
    }

    public function isAdmin()
    {
        return $this->role==self::ADMIN;
    }

    public function isAuthor()
    {
        return $this->role==self::AUTHOR;
    }

    public function isEditor()
    {
        return $this->role==self::CHIEF_EDITOR;
     }
}
