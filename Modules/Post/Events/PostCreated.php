<?php

namespace Modules\Post\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Post\Entities\Post;

class PostCreated
{
    use SerializesModels;
    /**
     * @var Post
     */
    public $post;



    /**
     * Create a new event instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {

        $this->post = $post;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
