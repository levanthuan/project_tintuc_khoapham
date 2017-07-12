<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";

    public function loaitin(){
    	return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');//idTheLoai : Khóa phụ bảng LoaiTin
    }

    public function tintuc(){
    	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id'); 
    	//idTheLoai : Khóa phụ bảng LoaiTin//idLoaiTin : Khóa phụ bảng TinTuc//id : Khóa chính bảng Thể Loại    	
    }
}
