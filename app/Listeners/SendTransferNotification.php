<?php
/**
 * PHP Version 7.2
 *
 * @category Listeners
 * @package  App\Listeners
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Listeners
 */
namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\TransferSent;
use App\Notifications\TransferReceived;

/**
 * Class SendTransferNotification
 *
 * @category Listeners
 * @package  App\Listeners
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class SendTransferNotification
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
     * @param object $event The event being listened
     *
     * @return void
     */
    public function handle(TransferSent $event)
    {        
        $event->user->notify(new TransferReceived($event->transaction));
    }
}
