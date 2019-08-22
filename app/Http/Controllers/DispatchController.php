<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;
use App\DA\UserModel;

class DispatchController extends Controller
{
	public function form($id){
		$data = ProjectModel::exists($id);
		$employee = UserModel::getByProfile('Teknisi');
		return view('dispatch.form', compact('data', 'employee'));
	}
	public function save($id, Request $req){
		$data = ProjectModel::dispatchSave($id, $req);
		return redirect('/dispatch');
	}
	public function list(){
		$data = ProjectModel::getByStep(5);
		return view('dispatch.list', compact('data'));
	}
}
