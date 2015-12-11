<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use DB;
use Input;
use Schema;

use App\User;
use App\DBAdmin;

use Illuminate\Http\Request;

use Config;
use Auth;

class DBAdminController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');  
    }

    public function getIndex()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('dbadmin.index')->with('users', $users);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $this->dbaction($id);
        return view('dbadmin.show')->with('user', $user);
    }

    /*
    *   $table: profile, posts, profile_profile
    *   $id:    user->id  
    *
    */
    public function getCreate($table, $id)
    {
        $this->dbaction($id);
        DB::unprepared(file_get_contents(base_path() . '/resources/sql/' . $table . ' create table.sql'));
        return back();
    }

    /*
    *   $table: profile, posts, profile_profile
    *   $id:    user->id  
    *
    */
    public function getInsert($table, $id)
    {
        $this->dbaction($id);
        DB::unprepared(file_get_contents(base_path() . '/resources/sql/' . $table . ' insert.sql'));
        return back();
    }

    /*
    *   $table: profile, posts, profile_profile
    *   $id:    user->id  
    *
    */
    public function getRebuilt($table, $id)
    {
        $this->dbaction($id);
        Schema::drop($table);
        DB::unprepared(file_get_contents(base_path() . '/resources/sql/' . $table . ' create table.sql'));
        DB::unprepared(file_get_contents(base_path() . '/resources/sql/' . $table . ' insert.sql'));
        return back();
    }

    /*
    *   $table: profile, posts, profile_profile
    *   $id:    user->id  
    *
    */
    public function getTruncate($table, $id)
    {
        $this->dbaction($id);
        DB::table($table)->truncate();
        return back();
    }

    /*
    *   $table: profile, posts, profile_profile
    *   $id:    user->id  
    *
    */
    public function getDrop($table, $id)
    {
        $this->dbaction($id);
        Schema::drop($table);
        return back();
    }

    /*
    *   richtet die DB des betreffenden Nutzers ein  
    *
    */
    private function dbaction($id)
    {
            Config::set("database.connections.friendzone_" . $id, array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'friendzone_' . $id,
                'username'  => 'friendzone_' . $id,
                'password'  => User::find($id)->db_password,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ));

            Config::set('database.default', "friendzone_" . $id);
    }

}