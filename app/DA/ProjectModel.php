<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class ProjectModel
{
	const TABLE = 'project';

  public static function exists($id)
  {
    return DB::table(self::TABLE)->where('ID_Sys', $id)->first();
  }
  public static function stepByid($id)
  {
    return DB::table('step')->where('ID_Sys', $id)->first();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->select('project.*', 'step.Nama_Step')->leftJoin('step', 'project.Step_ID', '=', 'step.ID_Sys')->orderBy('ID_Sys', 'desc')->get();
  }
  public static function getSelesaiByPT($pt)
  {
    return DB::table(self::TABLE)->where('Jenis_Project', $pt)->where('Status_Teknisi', 'Selesai')->orderBy('ID_Sys', 'desc')->get();
  }

  public static function getByStep($step)
  {
    return DB::table(self::TABLE)->where('Step_ID', $step)->get();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::exists($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("ID_Sys" , $id)
      ->update([
        "Nama_Pelanggan" => $req->Nama_Pelanggan,
        "Alamat" => $req->Alamat,
        "Koordinat" => $req->Koordinat,
        "Surveyor" => $req->Surveyor
      ]);
      
    }else{
      $ID_AI = DB::table(self::TABLE)
      ->insertGetId([
        "Nama_Pelanggan" => $req->Nama_Pelanggan,
        "Alamat" => $req->Alamat,
        "Koordinat" => $req->Koordinat,
        "Step_ID" => 1,
        "Created_At" => DB::raw('now()'),
        "Surveyor" => $req->Surveyor
      ]);
      //generate ID_PRoject
      $template = 'IDP';
      if(strlen($ID_AI)==1)
        $ID_Project_Generate = $template.'000'.$ID_AI;
      else if(strlen($ID_AI)==2)
        $ID_Project_Generate = $template.'00'.$ID_AI;
      else if(strlen($ID_AI)==3)
        $ID_Project_Generate = $template.'0'.$ID_AI;
      else
        $ID_Project_Generate = $template.$ID_AI;
      DB::table(self::TABLE)
      ->where("ID_Sys" , $ID_AI)
      ->update([
        "ID_Project_Generate" => $ID_Project_Generate
      ]);
    }
  }
  public static function surveySave($id, $req)
  {
    $data = self::exists($id);
    $step = self::stepByid($data->Step_ID);
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update([
      "Jenis_Project" => $req->Jenis_Project,
      "Total_ODP" => $req->Total_ODP,
      "Panjang_Kabel" => $req->Panjang_Kabel,
      "Tiang_Baru" => $req->Tiang_Baru,
      
      "Total_Budget" => str_replace(',', '', $req->Total_Budget),
      "Tanggal_Input" => $req->Tanggal_Input,
      "Step_ID" => $step->Next_Step
    ]);
  }
  public static function updateFile($id, $inputArray)
  {
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update($inputArray);
  }
  public static function approvalSave($id, $req)
  {
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update([
      "Step_ID" => $req->Status
    ]);
  }
  public static function bookSave($id)
  {
    $data = self::exists($id);
    $step = self::stepByid($data->Step_ID);
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update([
      "Step_ID" => $step->Next_Step
    ]);
  }
  public static function bookAdd($id, $req)
  {
    DB::table('booking_odp')
    ->insert([
      "Project_ID" => $req->Project_ID,
      "Project_Name" => $req->Project_Name,
      "Nama_ODP" => $req->Nama_ODP,
      "Nama_ODC" => $req->Nama_ODC,
      "Koordinat_ODP" => $req->Koordinat_ODP,
      "Tanggal_Order" => $req->Tanggal_Order
    ]);
  }
  public static function booked($id)
  {
    return DB::table('booking_odp')
    ->where("Project_ID" , $id)
    ->get();
  }

  public static function dispatchSave($id, $req)
  {
    $data = self::exists($id);
    $step = self::stepByid($data->Step_ID);
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update([
      
      "Step_ID" => $step->Next_Step,
      "Teknisi" => $req->Teknisi
    ]);
  }
  public static function teknisiSave($id, $req)
  {
    if($req->Status_Teknisi == 'Selesai'){
      $data = self::exists($id);
      $step = self::stepByid($data->Step_ID);
      $next = $step->Next_Step;
    }else{
      $next = 6;
    }
    DB::table(self::TABLE)
    ->where("ID_Sys" , $id)
    ->update([
      "Alamat" => $req->Alamat,
      "Jenis_Project" => $req->Jenis_Project,
      "Status_Teknisi" => $req->Status_Teknisi,
      "Tgl_Status" => $req->Tanggal_Input,
      "Panjang_Kabel" => $req->Panjang_Kabel,
      "Tiang_Baru" => $req->Tiang_Baru,
      "Total_ODP" => $req->Total_ODP,
      "Step_ID" => $next
    ]);
  }
  public static function getDataChart(){
    return DB::select('SELECT s.*, ( select count(*) from project where Step_ID=s.ID_Sys ) as jumlah FROM step s WHERE 1');
  }
}
