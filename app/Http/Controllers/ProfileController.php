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

class ProfileController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Schema::hasTable('profiles'))
        {
            $profiles=DB::table('profiles')->orderBy('name', 'asc')->paginate(15);
            return view('profiles.index',compact('profiles')); 
        }
        else 
        {
            return 404;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSimpleSearch()
    {
        $name = Input::get('q');
        //$profiles=DB::table('profiles')->where('forename', $name)->orWhere('name', $name)->orderBy('name', 'asc')->paginate(15);
        $profiles=DB::table('profiles')->whereRaw("concat(forename, ' ', name) like '%$name%' ")->orderBy('name', 'asc')->paginate(15);
        return view('profiles.index',compact('profiles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdvancedSearch()
    {
        $name = Input::get('name');
        $forename = Input::get('forename');
        $gender = Input::get('gender');
        $city = Input::get('city');
        $color = Input::get('color');

        //var_dump(Input::get());

        $profiles=DB::table('profiles')->where('name', 'like', "%$name%")->where('forename', 'like', "%$forename%")->where('gender', 'like', "$gender%")
            ->where('city', 'like', "%$city%")->where('color', 'like', "%$color%")->orderBy('name', 'asc')->paginate(15);
        return view('profiles.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile=Request::all();
        $newProfile = Profile::create($profile);
        return redirect('profiles/' . $newProfile->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile=Profile::find($id);
        return view('profiles.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::find($id);
        return view('profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $profileUpdate=Request::all();
       $profile=Profile::find($id);
       $profile->update($profileUpdate);
       return redirect('profiles/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::find($id)->delete();
        return redirect('profiles');
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost($id)
    {
        return view('posts.create', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $profile=Request::all();
        $newProfile = Profile::create($profile);
        return redirect('profiles/' . $newProfile->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

}
