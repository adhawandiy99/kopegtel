<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;
use App\DA\UserModel;

class ProjectController extends Controller
{
	public function input($id){
		$data = ProjectModel::exists($id);
		$employee = UserModel::getByProfile('Waspang');
		return view('project.create', compact('data', 'employee'));
	}
	public function save($id, Request $req){
		$data = ProjectModel::insertOrUpdate($id, $req);
		return redirect('/');
	}
	public function monitor($pt){
		$data = ProjectModel::getSelesaiByPT($pt);
		return view('project.monitor', compact('data'));
	}
}
