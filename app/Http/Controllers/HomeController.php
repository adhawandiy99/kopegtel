<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\DA\ProjectModel;
use DB;
class HomeController extends Controller
{
	public function index(){
		$ftthtotal = DB::table('project')->select(DB::raw('SUM(Total_Budget) as total'))->where('Jenis_Project', 'FTTH')->where('Status_Teknisi', 'Selesai')->first()->total;
		$ftthongoing = DB::table('project')->select(DB::raw('SUM(Total_Budget) as total'))->where('Jenis_Project', 'FTTH')->where('Status_Teknisi', 'On-Going')->first()->total;
		$wifitotal = DB::table('project')->select(DB::raw('SUM(Total_Budget) as total'))->where('Jenis_Project', 'WIFI.ID')->where('Status_Teknisi', 'Selesai')->first()->total;
		$wifiongoing = DB::table('project')->select(DB::raw('SUM(Total_Budget) as total'))->where('Jenis_Project', 'WIFI.ID')->where('Status_Teknisi', 'On-Going')->first()->total;
		$ftth =['FTTH', $ftthtotal, $ftthongoing];
		$wifi =['WIFI.ID', $wifitotal, $wifiongoing];
		$line = [
            $ftth,
            $wifi
        ];
		return view('welcome', compact('line'));
	}
}
