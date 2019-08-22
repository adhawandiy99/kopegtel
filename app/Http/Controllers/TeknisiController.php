<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;

class TeknisiController extends Controller
{
	public function form($id){
		$data = ProjectModel::exists($id);
		return view('index_teknisi.form', compact('data'));
	}
	public function save($id, Request $req){
		$data = ProjectModel::teknisiSave($id, $req);
		$input = 'File_Teknisi';
    if ($req->hasFile($input)) {
    	//dd('asd');
      $path = public_path().'/upload/teknisi/';
      if (!file_exists($path)) {
        if (!mkdir($path, 0775, true))
          return 'gagal menyiapkan folder foto evidence';
      }
      $file = $req->file($input);
      try {
      	$nama = $file->getClientOriginalName();
        $moved = $file->move("$path", "$nama");
        ProjectModel::updateFile($id, ["File_Teknisi"=>$nama]);
      }
      catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
        return 'gagal menyimpan foto evidence '.$id;
      }
    }
		return redirect('/index_teknisi');
	}
	public function list(){
		$data = ProjectModel::getByStep(6);
		return view('index_teknisi.list', compact('data'));
	}
}
