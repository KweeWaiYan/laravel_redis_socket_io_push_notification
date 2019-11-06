<?php
/**
 * PHP Version 7.2
 *
 * @category Rules
 * @package  App\Rules
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Rules
 */
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


/**
 * Class UserTransferLimit
 *
 * @category Rules
 * @package  App\Rules
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class UserTransferLimit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine the amount the user is trying to transfer is available in the 
     * his/her account.
     *
     * @param string $attribute The attribute being checked
     * @param mixed  $value     The attribute's value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return ($value <= auth()->user()->crypt_amount);    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The transfer amount can not exceed the total available 
            in your account.';
    }
}
