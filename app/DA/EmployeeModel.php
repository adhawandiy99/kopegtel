<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class EmployeeModel
{
	const TABLE = 'employee';

  public static function getEmployeeById($id)
  {
    return DB::table(self::TABLE)->where('ID_Sys', $id)->first();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('ID_Sys', $id)->delete();
  }
  public static function getByJobDesc($jd)
  {
    return DB::table(self::TABLE)->select('ID_Sys as id', 'Nama_Employee as text')->where('Job_Desc', $jd)->get();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::getEmployeeById($id);
    if($exist){
      DB::table(self::TABLE)
        ->where("ID_Sys" , $id)
        ->update([
            "NIK"       => $req->NIK,
            "Nama_Employee"      => $req->Nama_Employee,
            "Job_Desc"   => $req->Job_Desc
        ]);
    }else{
      DB::table(self::TABLE)
      ->insert([
            "NIK"       => $req->NIK,
            "Nama_Employee"      => $req->Nama_Employee,
            "Job_Desc"   => $req->Job_Desc
      ]);
    }
  }
}
