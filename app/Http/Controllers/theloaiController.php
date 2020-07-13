<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
class theloaiController extends Controller
{
    public function getDanhsach(){
    	$theloai=TheLoai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getSua(){

    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
    	echo $request->Ten;
    }
}
