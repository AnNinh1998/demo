<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class slideController extends Controller
{
    public function getDanhsach(){
    	$slide=Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getSua(){

    }
    public function getThem(){

    }
}
