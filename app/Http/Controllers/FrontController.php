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
use Illuminate\Foundation\Inspiring;

/**
 * Class FrontController
 *
 * @category Controllers
 * @package  App\Http\Controllers
 * @author   Thiago Mallon <thiagomallon@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://www.linkedin.com/in/thiago-mallon/
 */ 
class FrontController extends Controller
{
    /**
     * Public method __construct - Constructor method
     *
     * @method void __construct Constructor method
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Public method index - Index action
     *
     * @method object index Index action
     * @return object Returns the view object
     */
    public function index(): object
    {
        $message = Inspiring::quote(); // get a Laravel's inspiring quote

        return view('front.home', compact('message'));
    }
}
