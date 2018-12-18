<?php

namespace Modules\Post\Database\Seeders;

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\Tag;

class SeedFakePostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(User::class, 1)->create()->each(function ($user) {
            for ($i=0; $i < 10; $i++) {
                $post              = factory(Post::class)->make();
                $post->post_author = $user->id;
                $post->save();
                $user->posts()->save($post);
                $post->tags()->save(factory(Tag::class)->make());
            }
        });

    }
}
