<?php
/**
 * PHP Version 7.2
 *
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Http\Controllers
 */
namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use Illuminate\Http\Request;    
use App\UserTransfer;
use App\Transfer;
use App\User;

/**
 * Class TransferController
 *
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class TransferController extends Controller
{

    /**
     * Public method processTransfer - Process the database operations
     *
     * @param \App\Http\Requests\TransferRequest $request Request class 
     *
     * @method void processTransfer Process the database operations
     * @return void 
     */
    public function processTransfer(TransferRequest $request)
    {
        // retrieve the emitter and receiver data
        $emitter = auth()->user();
        $receiver = User::where('username', $request->username)->first();

        // persist the transaction data
        $transfer = $this->persistTransferData($emitter, $receiver, $request);

        // call the transfer dispatcher
        $transaction = ['receiver'=>$receiver->username, 
            'emitter'=>$emitter->username, 
            'transfer_id'=>$transfer->id,
            'receiver_amount'=> User::find($receiver->id)->crypt_amount
        ];
        
        \App\Events\TransferSent::dispatch($transaction, $receiver); 
        
        return response()->json(
            ["emitter_amount" => User::find($emitter->id)->crypt_amount]
        );
    }

    /**
     * Method persistTranserData - Create and modity records relative to the 
     * transaction.
     * 
     * @param \App\User                          $emitter  The transfer emitter 
     *                                                     object
     * @param \App\User                          $receiver The transfer receiver 
     *                                                     object
     * @param \App\Http\Requests\TransferRequest $request  Request class 
     *
     * @method object persistTranserData Create and modity records relative to the 
     * transaction
     * @return object
     */
    public function persistTransferData($emitter, $receiver, $request): object
    {
        // decrement the amount in the emitter's account
        User::find($emitter->id)->decrement('crypt_amount', $request->amount);
        
        // create the record for the transfer receiver
        $transfer = $receiver->transfers()
            ->save(new Transfer(['amount'=>$request->amount]));

        // create the record for the transfer emitter
        $emitter->userTransfers()
            ->save(new UserTransfer(['transfer_id'=>$transfer->id]));

        // increase the amount in the receiver's account
        User::find($receiver->id)->increment('crypt_amount', $request->amount);

        return $transfer;
    }

    /**
     * Public method getDropDownNotifications - Get the last 10 notifications
     *
     * @method object getDropDownNotifications Get the last 10 notifications
     * @return object 
     */
    public function getDropDownNotifications(): object
    {
        /* mark all notifications as read */
        auth()->user()->unreadNotifications->markAsRead();
        
        $user = new User();
        $res = $user->getUserReceivings(auth()->user()->id)
            ->orderBy('created_at','desc')->limit(10)->get();
        return response()->json($res); 
    }
}
