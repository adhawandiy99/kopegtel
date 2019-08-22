<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class LoginModel
{
	public static function login($user, $pass){
		return DB::select('
		SELECT *
		FROM users
		WHERE Username = ? AND Password = MD5(?)', [$user, $pass]);
	}
}
