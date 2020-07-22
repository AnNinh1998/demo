<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaitin;
use  Validator;
use DB;

class loaitinController extends Controller
{
    public function getDanhsach(){
    	$loaitin=Loaitin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem(){
    	$theloai=TheLoai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request){
    	$mesage=[
    		'.required'=>'bạn chưa nhập dữ liệu',
    		'ten.min'=>'Độ dài tên thể loại chưa đủ',
            'ten.max'=>'Bạn đã nhập quá độ dài tên thể loại',
            'ten.unique'=>'Tên thể loại đã tồn tại'
    	];
    	$validator= Validator::make($request->all(),[
    		'ten'=>'required|min:3|max:15|unique:LoaiTin,ten'
    	],$mesage);
    	if($validator->fails()){
    		return redirect('admin.loaitin.danhsach')
    		->withErrors($validator)
    		->withInput();
    	}
    	else{
    		$loaitin= new LoaiTin;
    		$loaitin->ten=$request->ten;
    		$loaitin->idTheLoai=$request->TheLoai;
    		$loaitin->TenKhongDau=changeTitle($request->ten);
    		echo changeTitle($request->ten);
    		$loaitin->save();
    	
        	return
        	redirect('admin/loaitin/them')->with('thongbao','Đã thêm thành công');
    	}
    }

    public function getSua($id){
    	$theloai=TheLoai::all();
    	$loaitin=LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
    	$loaitin=LoaiTin::find($id);
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:3|max:15|unique:LoaiTin,Ten',
    			'TheLoai'=>'required'
    		],
    		[
    			'.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.min'=>'Độ dài tên thể loại chưa đủ',
                'Ten.max'=>'Bạn đã nhập quá độ dài tên thể loại',
                'Ten.unique'=>'Tên thể loại đã tồn tại',
                'TheLoai.required'=>'Chưa chọn thể loại'
    		]);
    	$loaitin=LoaiTin::find($id);
    	$loaitin->Ten=$request->Ten;
    	$loaitin->TenKhongDau=changeTitle($request->Ten);
    	$loaitin->idTheLoai=$request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$loaitin=LoaiTin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao','Đã xóa thành công');
    }
}
