<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Auth;
use Schema;

class Profile extends Model
{
	protected $fillable=[
        'forename',
        'name',
        'gender',
        'street',
        'city',
        'zipcode',
        'country',
        'mail',
        'password',
        'telephone',
        'color',
        'centimeters'
    ];

    public function posts()
	  {
	    return $this->hasMany('App\Post');
	  }


	 public function sheIsWantedFriend()
	{
	  if (Schema::hasTable('profile_profile'))
	  {
	  	return $this->belongsToMany('App\Profile', 'profile_profile', 'friend_id', 'profile_id');
	  }
	  else
	  {
	  	return $this->belongsToMany('App\Profile', 'profile_profile', 'friend_id', 'profile_id');
	  }
	  
	}

	// Same table, self referencing, but change the key order
	public function herWantedFriends()
	{
	  if (Schema::hasTable('profile_profile'))
	  {
	  	return $this->belongsToMany('App\Profile', 'profile_profile', 'profile_id', 'friend_id');
	}
	  else
	  {
	  	return $this->belongsToMany('App\Profile', 'profile_profile', 'profile_id', 'friend_id');
	  }
	}

}
