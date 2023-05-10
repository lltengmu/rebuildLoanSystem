<?php

namespace App\Events;

use App\Models\Client;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $client;
    public $category;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Client $client,string $category)
    {
        //将参数挂载到事件对象上，以便在订阅者类中可以访问
        $this->client = $client;
        $this->category = $category;
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
