<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrivateMessage implements ShouldBroadcast
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
        return new PrivateChannel('App.Models.User.' . $this->userID);
    }

    public function broadcastAs()
    {
        return 'private.message';
    }
}