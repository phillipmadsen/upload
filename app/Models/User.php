<?php
namespace Fully\Models;
use Cartalyst\Sentinel\Users\EloquentUser;
/**
 * Class User.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class User extends EloquentUser
{
	protected $fillable = ['path'];
}



// https://laracasts.com/series/build-project-flyer-with-me/episodes/11
