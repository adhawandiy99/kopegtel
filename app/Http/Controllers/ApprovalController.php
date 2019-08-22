<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;

class ApprovalController extends Controller
{
	public function form($id){
		$data = ProjectModel::exists($id);
		return view('approval.form', compact('data'));
	}
	public function save($id, Request $req){
		$data = ProjectModel::approvalSave($id, $req);
		return redirect('/approval');
	}
	public function list(){
		$data = ProjectModel::getByStep(3);
		return view('approval.list', compact('data'));
	}
}
