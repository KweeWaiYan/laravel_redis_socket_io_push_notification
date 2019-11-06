<?php
/**
 * PHP Version 7.2
 *
 * @category Auth
 * @package  App\Http\Controllers\Auth
 * @author   James Mallon <jamesmallondev@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */

/**
 * File namespace
 *
 * @subpackage Http\Controllers\Auth
 */
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

/**
 * Class customizations
 *
 * @see added-later by Thiago Mallon <thiagomallon@gmail.com> 
 */
use App\Http\Requests\RegistrationRequest;

/**
 * Class RegisterController
 *
 * @category Controller
 * @package  App\Http\Controllers\Auth
 * @author   James Mallon <jamesmallondev@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \App\Http\Requests\RegistrationRequest $request The request data
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegistrationRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data The request data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        session()->flash('message', 'thanks for registering with us!');

        return User::create(
            [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            ]
        );
    }
}
