<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Config;
use Auth;

class PagesController extends Controller {

    public function __construct()
    {
        if (Auth::check())
        {
            Config::set("database.connections.friendzone_" . Auth::user()->id, array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'friendzone_' . Auth::user()->id,
                'username'  => 'friendzone_' . Auth::user()->id,
                'password'  => Auth::user()->db_password,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ));

            Config::set('database.default', "friendzone_" . Auth::user()->id);
        }
    }

    public function home()
    {
        if (Auth::check()) {
            return redirect('admin');
        }
        else {
            return view('home');
        }
    }

    public function admin()
    {
        return view('admin');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function search()
    {
        return view('search');
    }

}