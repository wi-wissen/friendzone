<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
class SetUserDatabase {
	/**
	 * Sets the connection's database to the current user database
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // Get the current authenticated user
        $user = Auth::user();
        // Close any connection made before to avoid conflicts
        //DB::disconnect('tenantdb');
        // Set the connection's database to the user's own database
        Config::set("database.connections.mysql.friendzone_" . Auth::user()->id, array(
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
        
		return $next($request);
	}
}