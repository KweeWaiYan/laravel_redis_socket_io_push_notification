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

use Illuminate\Http\Request;
use App\Http\Requests\HomeMessageRequest; 
use App\Events\PublicMessageSent;   

/**
 * Class DashboardController
 *
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class DashboardController extends Controller
{
    /**
     * Public method __construct - The constructor method
     *
     * @method void __construct The constructor method
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Public method transfer - The transfer action
     *
     * @method object transfer The transfer action
     * @return object 
     */
    public function transfer(): object
    {
        return view('dashboard.transfer');
    }

    /**
     * Public method transactions - The transactions action
     *
     * @method object transactions The transactions action
     * @return object 
     */
    public function transactions(): object
    {
        /* mark all notifications as read */
        auth()->user()->unreadNotifications->markAsRead();

        $user = new \App\User();
        $transactions = $user->getUserTransactions(
            auth()
                ->user()->id
        )->paginate(5); 
        return view('dashboard.transactions', compact('transactions'));
        
    }
}
