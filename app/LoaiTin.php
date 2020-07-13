<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table="LoaiTin";
    public function theloai(){
    	//loại tin thuộc thể loại nào
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
    public function tintuc(){
    	//loại tin có bao nhiêu tin tức
    	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }
}
