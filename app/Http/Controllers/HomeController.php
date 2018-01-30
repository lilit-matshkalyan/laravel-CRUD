<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  Check admin users
        *  Written by Lilit Matshkalyan
        *  Date 30/Jan/2017
        *  Updated by
        *  Date
       */

        /*
        if (!(@in_array(Auth::user()->id, Config::get('services.admin_user_id')))) {
            return redirect('/');
        }
        */

        $users = User::All();
        //$emails = Email::All();
        //$search_history = Search::All();
        //$users_activity = Activity::All();



        return view('home', ['users' => $users]);
        //return view('home', ['users' => $users, 'emails' => $emails, 'search_history' => $search_history, 'users_activity' => $users_activity, 'fb_login_url' => $fb_login_url, 'google_login_url' => $authUrl]);




        //return view('home');
    }




}
