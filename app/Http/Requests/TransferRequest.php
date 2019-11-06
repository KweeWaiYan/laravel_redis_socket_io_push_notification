<?php
/**
 * PHP Version 7.2
 *
 * @category Requests
 * @package  App\Http\Requests
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Http\Requests
 */
namespace App\Http\Requests;
use App\Rules\UserTransferLimit;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TransferRequest
 *
 * @category Requests
 * @package  App\Http\Requests
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @method array rules Validates the inputs
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|alpha_num|exists:users',            
            'amount' => ['required','numeric','min:0.01', new UserTransferLimit]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @method array messages Implement customized validation messages to the 
     * registration form
     *
     * @return array
     */
    public function messages(): array       
    {
        return [
            'username.exists' => 
            'The user for whom you are transferring does not exist in our records.',
            'amount.min' => 'The minimum amount have to be positive, at least 0.01'
        ];
    }
}
