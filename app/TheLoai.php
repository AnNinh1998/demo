<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table="TheLoai";
    //bắt đầu từ TheLoai vì nó là bảng cao nhất
    //tạo liên kết giữa các model
    public function loaitin()
    {
    	//thể loại có nhiều loại tin nên dùng hasMany
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');//(model,khóa ngoại liên kết,khóa chính của Thể loại)
    }
    public function tintuc(){
    	//muốn biết thể loại có bao nhiêu tin tức
    	//liên kết trung gian qua Tin tức
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
