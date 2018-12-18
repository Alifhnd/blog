<?php

namespace Modules\Post\Listeners;

use App\Model\User;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Modules\Post\Events\PostCreated;

class NotifyUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    /**
     * Handle the event.
     *
     * @param PostCreated $event
     *
     * @return void
     */
    public function handle(PostCreated $event)
    {
        //$event = $event->post->storePost('postTitle');
        //$userMails = User::all()->pluck('email')->toArray();
        //foreach ($userMails as $mail){
        //    Mail::send($event ,[] , $mail);
        //}
    }
}
