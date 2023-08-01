<?php

namespace App\Events;

use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoginEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //用户模型
    public $user;
    //用户身份
    public $identify;
    //一些需要的信息
    public $equipmentInformation;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Individuals | ServiceProvider | Client $user,string $identify,array $equipmentInformation)
    {
        $this->user = $user;
        $this->identify = $identify;
        $this->equipmentInformation = $equipmentInformation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
