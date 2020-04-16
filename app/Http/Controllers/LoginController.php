<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Config;
use Auth;
use Illuminate\Support\Facades\Session;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;

class LoginController extends Controller
{
   
    public function __construct()
    {
         
    }

    public function login(Request $request) {
        return view('auth.login');
    }
     
    public function authenticate(Request $request) {
        
        $form_post = $request->all();
        //dd($form_post);

        $attempt = Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        //dd($attempt);
        
        if ($attempt == 1) {
            Session::put('email', $request->input('email'));
            Session::put('region_domain', 'region_domainsada');

            return redirect('home');
        }
    } 

}