<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;
//use Validator;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
    	$theloai = TheLoai::all();
    	return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(TheLoaiRequest $request){
    	// $rules = [
    	// 		'Ten' => 'required|min:3|max:100'
    	// 	];
    	// $message = [
    	// 		'Ten.required'  => 'Bạn chưa nhập tên thể loại',
    	// 		'Ten.min'		=> 'Tên thể loại quá ngắn',
    	// 		'Ten.max'		=> 'Tên thể loại quá dài'
    	// 	];
    	// $this->validate($request, $rules, $message);
    	$theloai = new TheLoai;
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);
    	$theloai->save();
    	return redirect('admin/theloai/them')->with('thongbao', 'Thêm Thành công');
    }

    public function getSua($id){
    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }

    public function postSua(TheLoaiRequest $request, $id){
    	// $rules = [
    	// 		'Ten' => 'required|unique:TheLoai,Ten|min:3|max:100'
    	// 	];
    	// $message = [
    	// 		'Ten.required'  => 'Bạn chưa nhập tên thể loại',
    	// 		'Ten.unique'	=> 'Tên thể loại đã tồn tại',
    	// 		'Ten.min'		=> 'Tên thể loại quá ngắn',
    	// 		'Ten.max'		=> 'Tên thể loại quá dài'
    	// 	];
    	// $theloai = TheLoai::find($id);
    	// $this->validate($request, $rules, $message);
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = changeTitle($request->Ten);

    	$theloai->save();

    	return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
    	$theloai = TheLoai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
