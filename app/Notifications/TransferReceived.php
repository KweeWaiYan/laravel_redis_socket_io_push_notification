<?php
/**
 * PHP Version 7.2
 *
 * @category Notifications
 * @package  App\Notifications
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Notifications
 */
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

/**
 * Class TransferReceived
 *
 * @category Notifications
 * @package  App\Notifications
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class TransferReceived extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Property $transaction - The event payload
     *
     * @var array $transaction The event payload
     */
    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @param array $transaction The event payload
     *
     * @return void
     */
    public function __construct(array $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable The notifiable object
     *
     * @return array
     */
    public function via($notifiable): array
    {
        return ['broadcast', 'database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param object $notifiable The notifiable object
     *
     * @return array
     */
    public function toDatabase($notifiable): array
    {
        return $this->transaction;
    }

    /**
     * Method \Illuminate\Notifications\Messages\BroadcastMessage - The message 
     * to be broadcasted.
     *
     * @param object $notifiable The notifiable object
     *
     * @method object \Illuminate\Notifications\Messages\BroadcastMessage The 
     * message to be broadcasted
     * @return object
     */
    public function toBroadcast(object $notifiable): object 
    {

        return (new BroadcastMessage($this->transaction));
    }
}
