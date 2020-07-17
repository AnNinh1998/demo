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

    public function getSua($id){
        $theloai=TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $theloai=TheLoai::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|unique:TheLoai,Ten|min:3|max:15',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.unique'=>'Tên thể loại đã tồn tại',
                'Ten.min'=>'Độ dài tên thể loại chưa đủ',
                'Ten.max'=>'Bạn đã nhập quá độ dài tên thể loại'
            ]);
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau=changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,
            [
                'ten'=>'required|min:3|max:15|unique:TheLoai,Ten',
                
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên thể loại',
                'ten.min'=>'Độ dài tên thể loại chưa đủ',
                'ten.max'=>'Bạn đã nhập quá độ dài tên thể loại',
                'ten.unique'=>'Tên thể loại đã tồn tại'
            ]);
        $theloai= new TheLoai;
        $theloai->ten=$request->ten;
        $theloai->TenKhongDau=changeTitle($request->ten);
        echo changeTitle($request->ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Đã thêm thành công');
    }

    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();

        return redirect('admin/theloai/danhsach')->with('thongbao','Đã xóa thành công');
    }
}
