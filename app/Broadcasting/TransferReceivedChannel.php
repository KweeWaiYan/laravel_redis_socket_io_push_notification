<?php
/**
 * PHP Version 7.2
 *
 * @category Channels
 * @package  App\Broadcasting
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Broadcasting
 */
namespace App\Broadcasting;

use App\User;

/**
 * Class TransferReceivedChannel
 *
 * @category Channels
 * @package  App\Broadcasting
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class TransferReceivedChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param string $receiver The username of the receiver. 
     * @param \App\User $user The receiver id
     *
     * @return array|bool
     */
    public function join(User $user, $receiver): bool
    {
        return ($user->id == $receiver);
    }
}
