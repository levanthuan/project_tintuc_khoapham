<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests\LoaiTinRequest;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
    	$loaitin = LoaiTin::all();  	
    	return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
    }

    public function getThem(){
    	$theloai = TheLoai::all();
    	return view('admin.loaitin.them', ['theloai'=>$theloai]);    	
    }

    public function postThem(LoaiTinRequest $request){
    	$loaitin = new LoaiTin;
    	$loaitin->Ten = $request->Ten;
    	$loaitin->TenKhongDau = changeTitle($request->Ten);
    	$loaitin->idTheLoai = $request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/them')->with('thongbao', 'Thêm loại tin thành công');
    }

    public function getSua($id){
    	$loaitin = LoaiTin::find($id);
    	$all_theloai = TheLoai::all();
    	return view('admin.loaitin.sua', ['loaitin'=>$loaitin, 'all_theloai'=>$all_theloai]);
    }

    public function postSua(LoaiTinRequest $request, $id){        
    	$loaitin = LoaiTin::find($id); 
    	$loaitin->Ten = $request->Ten;
    	$loaitin->TenKhongDau = changeTitle($request->Ten);
    	$loaitin->idTheLoai = $request->TheLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$loaitin = LoaiTin::find($id);
    	$loaitin->delete();

    	return redirect('admin/loaitin/danhsach'.$id)->with('thongbao', 'Bạn đã xóa thành công');
    }
}
