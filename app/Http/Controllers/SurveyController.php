<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;

class SurveyController extends Controller
{
	public function surveyForm($id){
		$data = ProjectModel::exists($id);
		return view('survey.form', compact('data'));
	}
	public function save($id, Request $req){
		$data = ProjectModel::surveySave($id, $req);
		$input = 'File_Name';
    if ($req->hasFile($input)) {
    	//dd('asd');
      $path = public_path().'/upload/survey/';
      if (!file_exists($path)) {
        if (!mkdir($path, 0775, true))
          return 'gagal menyiapkan folder foto evidence';
      }
      $file = $req->file($input);
      try {
      	$nama = $file->getClientOriginalName();
        $moved = $file->move("$path", "$nama");
        ProjectModel::updateFile($id, ["File_Name"=>$nama]);
      }
      catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
        return 'gagal menyimpan foto evidence '.$id;
      }
    }
		return redirect('/survey');
	}
	public function surveyList(){
		$data = ProjectModel::getByStep(1);
		return view('survey.list', compact('data'));
	}
	public function revisiList(){
		$data = ProjectModel::getByStep(2);
		return view('survey.list', compact('data'));
	}
	public function inboxList(){
		$data = ProjectModel::getAll();
		return view('survey.list', compact('data'));
	}
}
