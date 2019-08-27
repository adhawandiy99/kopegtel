<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;

class PegawaiController extends Controller
{
	public function index(){
		$data = DB::table('pegawai')->get();
		return view('pegawai.index', compact('data'));
	}
	public function input($id){
		$data = DB::table('pegawai')->where('id', $id)->first();
		return view('pegawai.form', compact('data'));
	}
	public function save($id, Request $req){
		$exist = DB::table('pegawai')->where('id', $id)->first();
		if($exist){
			DB::table('pegawai')->where('id', $id)->update(["NIP"=>$req->NIP, "Nama"=> $req->Nama, "Tanggal_Lahir"=>$req->Tanggal_Lahir]);
		}else{
			DB::table('pegawai')->insert(["NIP"=>$req->NIP, "Nama"=> $req->Nama, "Tanggal_Lahir"=>$req->Tanggal_Lahir]);
		}
		return redirect('/pegawai');
	}
	public function delete($id){
		$data = DB::table('pegawai')->where('id', $id)->delete();
		return redirect('/pegawai');
	}
}
