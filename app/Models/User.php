<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class User.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class User extends EloquentUser implements HasMedia, HasMediaConversions
{
	use HasMediaTrait;



 	public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('images');
    }




	public function articles()
    {
        return $this->hasMany(\Fully\Models\Article::class, 'user_id')->where('status_id', 3)->orderBy('created_at', 'DESC');
    }
    public function all_articles()
    {
        return $this->hasMany(\Fully\Models\Article::class, 'user_id')->orderBy('created_at', 'DESC');
    }
    public function latest_articles()
    {
        return $this->hasMany(\Fully\Models\Article::class, 'user_id')->where('status_id', 3)->orderBy('created_at', 'DESC')->take(5);
    }


	public static function edit($user_id, /*$name, $surname, $username,*/ $email, $first_name, $last_name)
    {
        $user = static::find($user_id);
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        // $user->surname = $surname;
        // $user->username = $username;
        $user->email = $email;
        return $user;
    }



}
