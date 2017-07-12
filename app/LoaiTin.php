<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table = "LoaiTin";

    public function theloai() 
    {
    	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');//idTheLoai: Khóa phụ bảng LoaiTin, id: Khóa chính bảng LoaiTin
    }

    public function tintuc(){
    	return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
    }
}
