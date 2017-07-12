<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangnhapRequest;
use App\Http\Requests\DangkyRequest;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\User;

class PagesController extends Controller
{
    //
	function __construct()
    {
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);     
	}

    public function trangchu()
    {
    	return view('pages.trangchu');
    }

    public function lienhe()
    {
    	return view('pages.lienhe');
    }

    public function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin', ['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }

    public function getDangnhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangnhap(DangnhapRequest $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('error', 'Tài khoản hoặc mật khẩu không đúng ');
        }
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }

    public function getNguoidung()
    {
        $user = Auth::user();
        return view('pages.nguoidung', ['nguoidung'=>$user]);
    }

    public function postNguoidung(Request $request)
    {
        $rules = [
                    'name'          => 'required|max:25|min:6'
                ];
        $message = [
                    'name.required'             => 'Tên không được để trống',
                    'name.min'                  => 'Tên user phải lớn hơn 6 ký tự',
                    'name.max'                  => 'Tên user phải nhỏ hơn 25 ký tự' 
                ];
        $this->validate($request, $rules, $message);
        $user = Auth::user();
        $user->name = $request->name;

        if ($request->checkPassword == "on"){
            $rules = [
                        'password'      => 'required|min:6|max:32',
                        'passwordAgain' => 'required|same:password',
                    ];
            $message = [
                        'password.required'         => 'Hãy nhập password',
                        'password.min'              => 'Password phải lớn hơn 6 ký tự',
                        'password.max'              => 'Password phải ít hơn 32 ký tự',
                        'passwordAgain.required'    => 'Hãy nhập reset password',
                        'passwordAgain.same'        => 'Reset password không trùng khớp với password' 
                    ];
            $this->validate($request, $rules, $message);            
            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        return redirect('nguoidung')->with('thongbao', 'Bạn đã sửa thành công');
    }

    public function getDangky()
    {
        return view('pages.dangky');
    }

    public function postDangky(DangkyRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('dangnhap')->with('thongbao', 'Bạn đã đăng ký thành công');
    }

    function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orWhere('TomTat', 'like', "%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem', ['tukhoa'=>$tukhoa, 'tintuc'=>$tintuc]);
    }
}
