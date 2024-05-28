<?php

namespace App\Events;

use App\Models\ReturPenjualan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReturOrder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $retur;

    /**
     * Create a new event instance.
     */
    public function __construct(ReturPenjualan $retur)
    {
        $this->retur = $retur;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
