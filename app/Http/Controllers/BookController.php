<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\ProjectModel;

class BookController extends Controller
{
	public function form($id){
		$data = ProjectModel::exists($id);
		$booked = ProjectModel::booked($id);
		return view('booking_odp.form', compact('data', 'booked'));
	}
	public function saveODP($id, Request $req){
		$data = ProjectModel::bookAdd($id, $req);
		return redirect()->back();
	}
	public function saveNext($id){
		$data = ProjectModel::bookSave($id);
		return redirect('/booking_odp');
	}
	public function list(){
		$data = ProjectModel::getByStep(4);
		return view('booking_odp.list', compact('data'));
	}
}
