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

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transfer
 *
 * @category Models
 * @package  App
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class Transfer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount'
    ];
    /**
     * Public method users - The transfer receiver
     *
     * @method object users The transfer receiver
     * @return object 
     */
    public function user(): object
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Public method userTransfers - The record of this transfer on the UserTransfers
     *
     * @method object userTransfers The record of this transfer on the UserTransfers
     * @return object 
     */
    public function userTransfers(): object
    {
        return $this->belongsTo('App\UserTransfers');
    }
}
