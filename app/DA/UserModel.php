<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class UserModel
{
	const TABLE = 'users';

  public static function getUserById($id)
  {
    return DB::table(self::TABLE)->where('ID_Sys', $id)->first();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function getByProfile($profile)
  {
    return DB::table(self::TABLE)->select('ID_Sys as id', 'Nama as text')->where('Profile', $profile)->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('ID_Sys', $id)->delete();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::getUserById($id);
    if($exist){
      if($req->Password){
        DB::table(self::TABLE)
        ->where("ID_Sys" , $id)
        ->update([
            "Password" => MD5($req->Password)
        ]);
      }
      DB::table(self::TABLE)
      ->where("ID_Sys" , $id)
      ->update([
          "Username" => $req->Username,
          "Profile" => $req->Profile,
          "Nama" => $req->Nama,
          "Kontak" => $req->Kontak,
          "Alamat" => $req->Alamat
      ]);
      
    }else{
      DB::table(self::TABLE)
      ->insert([
          "Username" => $req->Username,
          "Password" => MD5($req->Password),
          "Profile" => $req->Profile,
          "Nama" => $req->Nama,
          "Kontak" => $req->Kontak,
          "Alamat" => $req->Alamat
      ]);
    }
  }
}
