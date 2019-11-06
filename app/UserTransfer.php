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
 *
 * @subpackage 
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTransfer
 *
 * @category Models
 * @package  App
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class UserTransfer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','transfer_id'
    ];
   
    /**
     * Public method users - The transfer emitter
     *
     * @method object users The transfer emitter
     * @return object 
     */
    public function users(): object
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Public method transfers - The transfer id
     *
     * @method object transfers The transfer id
     * @return object 
     */
    public function transfers(): object
    {
        return $this->hasOne('App\Transfer');
    }
}
