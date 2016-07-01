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








// public function photos()
// {
// 	return $this->belongsTo(Fully\Models\Product::class)
// }


}
