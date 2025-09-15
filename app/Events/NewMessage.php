<?php

// namespace App\Events;
// use Illuminate\Broadcasting\Channel;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


// class NewMessage implements ShouldBroadcast
// {
//     public $message;
//     public $userID;

//     public function __construct($userID, $message)
//     {
//         $this->userID = $userID;
//         $this->message = $message;
//     }

//     public function broadcastOn()
//     {
//         return new Channel('chat-App.Models.User.' . $this->userID);

//     }

//     public function broadcastAs()
//     {
//         return 'new.message'; // تأكد من الاسم
//     }
// }

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMessage implements ShouldBroadcast
{
    public $message;
    public $userID;

    public function __construct($userID, $message)
    {
        $this->userID = $userID;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // ✅ استخدام PrivateChannel مع التنسيق الصحيح
        // return new PrivateChannel('App.Models.User.'.$this->userID);
        return new Channel('App.Models.User.'.$this->userID);
    }

    public function broadcastAs()
    {
        return 'new.message';
    }
}