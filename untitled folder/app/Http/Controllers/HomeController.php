<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Request;
use Form;

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
        *  Date 30/Jan/2018
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


    public function edit($id)
    {
        /*  Edit user data page view
        *  Written by Lilit Matshkalyan
        *  Date 30/Jun/2017
        *  Updated by
        *  Date
       */

        return view('user_edit', ['user' => Auth::user()->id]);

    }


    public function destroy($id)
    {
        /*  Logout user
        *  Written by Lilit Matshkalyan
        *  Date 30/Jan/2018
        *  Updated by
        *  Date
       */


        $user = User::find($id);
        Session::flush($user);

        return Redirect::to("home");
    }


    public function delete($id)
    {
        /*  Logout user
        *  Written by Lilit Matshkalyan
        *  Date 14/Jul/2017
        *  Updated by
        *  Date
       */

        $user = User::find($id); //Auth::user()->id;
        $user->delete();

        return Redirect::to("home");
    }









}
