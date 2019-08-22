<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\EmployeeModel;

class EmployeeController extends Controller
{
	public function index(){
		$data = EmployeeModel::getAll();
		return view('employee.list', compact('data'));
	}
	public function input($id){
		$data = EmployeeModel::getEmployeeById($id);
		return view('employee.form', compact('data'));
	}
  public function save($id, Request $req){
    $data = EmployeeModel::insertOrUpdate($id, $req);
    return redirect('/employee');
  }
  public function delete($id){
    $data = EmployeeModel::delete($id);
    return redirect('/employee');
  }
}
