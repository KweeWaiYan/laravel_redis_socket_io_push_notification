<?php
/**
 * PHP Version 7.2
 *
 * @category Requests
 * @package  App\Http\Requests
 * @author   James Mallon <jamesmallondev@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Http\Requests
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegistrationRequest
 *
 * @category Requests
 * @package  App\Http\Requests
 * @author   James Mallon <jamesmallondev@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @method bool authorize 
     *
     * @return bool
     */
    public function authorize()
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
            'username' => 'required|string|alpha_num|unique:users|min:2|max:20',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|regex:
                /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
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
            'password.regex' => 'The password must contain at least 8 characters,
                    1 uppercase character [A-Z],
                    1 lowercase character [a-z],
                    1 digit [0-9],
                    1 special character (!, $, #, %, etc)'
        ];
    }
}
