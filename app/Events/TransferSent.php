<?php
/**
 * PHP Version 7.2
 *
 * @category Events
 * @package  App\Events
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Events
 */
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
/**
 * Class TransferSent
 *
 * @category Events
 * @package  App\Events
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class TransferSent 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Public property $transaction - The transaction data array
     *
     * @var array $transaction The transaction data array 
     */
    public $transaction;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param array $transaction The array with the transaction data
     *
     * @return void
     */
    public function __construct(array $transaction, object $user)
    {
        $this->transaction = $transaction;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()        
    {
        //return new PrivateChannel('transfer-sent.'.$this->transaction['receiver']);
        return [];
    }
}
