<?php
/**
 * PHP Version 7.2
 *
 * @category Models
 * @package  App
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 */
namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @category Models
 * @package  App
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','crypt_amount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Public method homeMessages - User messages
     *
     * @method object homeMessages User messages
     * @return object
     */
    public function homeMessages(): object
    {
        return $this->hasMany('App\HomeMessage');
    }

    /**
     * Public method userTransfers - User transfers
     *
     * @method object userTransfers User transfers
     * @return object
     */
    public function userTransfers(): object
    {
        return $this->hasMany('App\UserTransfer');
    }

    /**
     * Public method transfers - User receivings
     *
     * @method object transfers User receivings
     * @return object
     */
    public function transfers(): object
    {
        return $this->hasMany('App\Transfer');
    }

    /**
     * Public method getUserReceivings - Retrieves all receivings the a user id
     *
     * @param integer $userId The user id
     * @param integer $limit  The results limit
     * 
     * @method object getUserReceivings Retrieves all receivings the a user id
     * @return object
     */
    public function getUserReceivings(int $userId, int $limit = null): object
    {
        $query = \DB::table('users as u')
            ->select(
                'u.username as receiver',
                't.amount',
                't.created_at',
                'tu.username as emitter'
            )
            ->leftJoin('transfers as t', 'u.id', '=', 't.user_id')
            ->leftJoin('user_transfers as ut', 't.id', '=', 'ut.transfer_id')
            ->leftJoin('users as tu', 'tu.id', '=', 'ut.user_id')
            ->where('u.id', $userId)
            /* the engine creates an aditional value, this where condition was 
             * inserted to avoid this
             */ 
            ->where('ut.id', '!=', 'NULL'); 
        if ($limit) {
            $query->limit($limit);
        }
        
        return $query;
    }

    /**
     * Public method getUserTransfers - Retrieves all receivings the a user id
     *
     * @param integer $userId The user id
     *
     * @method object getUserTransfers Retrieves all receivings the a user id
     * @return object
     */
    public function getUserTransfers(int $userId): object
    {
        return \DB::table('users as u')
            ->select(
                'tu.username as receiver',
                't.amount',
                't.created_at',
                'u.username as emitter'
            )
            ->leftJoin('user_transfers as ut', 'u.id', '=', 'ut.user_id')
            ->leftJoin('transfers as t', 't.id', '=', 'ut.transfer_id')
            ->leftJoin('users as tu', 'tu.id', '=', 't.user_id')
            ->where('u.id', $userId)
            ->where('ut.id', '!=', 'NULL');
    }

    /**
     * Public method getUserTransactions - Return all transactions, receivings and
     * transfers
     *
     * @param integer $userId The user id
     *
     * @method object getUserTransactions Return all transactions, receivings and
     * transfers
     * @return object
     */
    public function getUserTransactions(int $userId): object
    {
        $receivings = $this->getUserReceivings($userId);
        $transfers = $this->getUserTransfers($userId);

        $query = $receivings->unionAll($transfers);

        // bellow is a trick to make pagination possible when using union
        // or union all.
        $querySql = $query->toSql();
        return \DB::table(
            \DB::raw("($querySql order by created_at desc) as user_transactions")
        )->mergeBindings($query);
    }

    /**
     * Method receivesBroadcastNotificationsOn - Returns the channel.
     *
     * @method string receivesBroadcastNotificationsOn Returns the channel
     * @return strin
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'user.'.$this->id;
    }
}
