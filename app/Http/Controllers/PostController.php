<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Profile;
use View;
use DB;
use Input;
use Config;
use Auth;
use Schema;

class PostController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($profile_id)
    {
        //return view('posts.create', $profile_id);
        $profile = Profile::findOrFail($profile_id);
        return View::make('posts.create')->withProfile($profile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=Request::all();
        $newpost = Post::create($post);
        return redirect('profiles/' . $newpost->profile_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=post::find($id);
        return view('posts.edit',compact('post'));
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
        $postUpdate=Request::all();
        $profile=Post::find($id);
        $profile->update($postUpdate);
        return redirect('posts/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('/');
    }
}
