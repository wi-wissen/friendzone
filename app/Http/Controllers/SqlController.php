<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use DB;
use Input;
use Config;
use Auth;
use Schema;
use Illuminate\Support\Facades\Hash;
use Debugbar;
use Table;

class SqlController extends Controller
{

    /**
     * Enforce Database per User.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');

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

    public function getQuery()
    {
        $table =false;
        if (Input::has('editor')) { 
             //Ergebnis vorbereiten
            try {
                $r = DB::select(Input::get('editor'));
                if (!$r) {
                        flash("Anfrage ausgeführt.", 'success');
                } else {
                    flash("Anfrage ausgeführt. " . count($r) ." Ergebnisse gefunden.", 'success');
                    $table = Table::create($r); 
                }
                              
            } catch(\Illuminate\Database\QueryException $ex){ 
                flash($ex->getMessage(), 'danger'); 
            }
        }


        //Tabelle darstellen
        $dbclass ="";
        $r = DB::table('information_schema.tables')->get();
        if (!$r) {
                echo "<div class='alert alert-danger'>Keine Tabellen gefunden.</div>";
        }
        foreach ($r as $v) {
            if (!strcmp($v->TABLE_TYPE, "BASE TABLE")) {
                $dbclass = $dbclass . "<b>" . $v->TABLE_NAME . ':</b> ';
                $columns = Schema::getColumnListing($v->TABLE_NAME);
                foreach ($columns as &$column) {
                    $dbclass = $dbclass . $column . ", ";
                }
                $dbclass = $dbclass . "<br />";
            }
        }



        return view('sql', ['result' => $table, 'tables' => $dbclass]);
    }
}