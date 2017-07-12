<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TintucRequest;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use Validator;

class TinTucController extends Controller
{
    public function getDanhSach(){
    	$tintuc = TinTuc::all();  	
    	return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getThem(){
    	$theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postThem(TintucRequest $request){
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->SoLuotXem = 0;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('error', 'Bạn chỉ được thêm ảnh có đuôi là jpg,png,jpeg');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc', $Hinh);
            $tintuc->Hinh = $Hinh;
        }else{
            $tintuc->Hinh = "";
        }
    	$tintuc->save();
    	return redirect('admin/tintuc/them')->with('thongbao', 'Thêm tin tức thành công');
    }

    public function getSua($id){
    	$tintuc = TinTuc::find($id);
    	$theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin.tintuc.sua', ['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postSua(TintucRequest $request, $id){
    	$tintuc = TinTuc::find($id); 
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;

        if ($request->hasFile('Hinh')) {        //Nếu có chọn hình
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('error', 'Bạn chỉ được thêm ảnh có đuôi là jpg,png,jpeg');
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc', $Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);//Xóa ảnh trong file upload/tintuc
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sửa tin tức thành công');
    }

    public function getXoa($id){
    	$tintuc = TinTuc::find($id);
        unlink("upload/tintuc/".$tintuc->Hinh);
    	$tintuc->delete();

    	return redirect('admin/tintuc/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
