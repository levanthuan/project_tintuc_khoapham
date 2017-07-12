<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Validator;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();
        return view('admin.user.danhsach', ['user'=>$user]);
    }

    public function getThem(){    	
        return view('admin.user.them');
    }

    public function postThem(Request $request){
        $rules = [
                    'name'          => 'required|max:25|min:6',
                    'email'         => 'required|unique:users,email|email',
                    'password'      => 'required|min:6|max:32',
                    'passwordAgain' => 'required|same:password',
                ];
        $message = [
                    'name.required'             => 'Tên không được để trống',
                    'name.min'                  => 'Tên user phải lớn hơn 6 ký tự',
                    'name.max'                  => 'Tên user phải nhỏ hơn 25 ký tự',
                    'email.required'            => 'Hãy nhập địa chỉ email của bạn',
                    'email.unique'              => 'Email của bạn đã tồn tại',
                    'email.email'               => 'Email của bạn không đúng định dạng',
                    'password.required'         => 'Hãy nhập password',
                    'password.min'              => 'Password phải lớn hơn 6 ký tự',
                    'password.max'              => 'Password phải ít hơn 32 ký tự',
                    'passwordAgain.required'    => 'Hãy nhập reset password',
                    'passwordAgain.same'        => 'Reset password không trùng khớp với password' 
                ];
        $this->validate($request, $rules, $message);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao', 'Thêm user thành công');

    }

    public function getSua($id){
    	$user = User::find($id);
        return view('admin.user.sua', ['user'=>$user]);
    }

    public function postSua(Request $request, $id){
        $rules = [
                    'name'          => 'required|max:25|min:6'
                ];
        $message = [
                    'name.required'             => 'Tên không được để trống',
                    'name.min'                  => 'Tên user phải lớn hơn 6 ký tự',
                    'name.max'                  => 'Tên user phải nhỏ hơn 25 ký tự'
                ];
        $this->validate($request, $rules, $message);
        $user = User::find($id);
        $user->name = $request->name;

        
        $user->quyen = $request->quyen;

        if($request->changePassword == "on"){
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

        return redirect('admin/user/sua/'.$id)->with('thongbao', 'Sửa user thành công');
    }

    public function getXoa($id){
    	$user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Xóa user thành công');
    }

    public function getdangnhapAdmin(){
        return view('admin.login');
    }

    public function postdangnhapAdmin(Request $request){
        $rules = [
                    'email'          => 'required|email',
                    'password'      => 'required|min:6|max:32',
                ];
        $message = [
                    'email.required'             => 'Tên không được để trống',
                    'email.email'               => 'Email bạn nhập không đúng định dạng',
                    'password.required'         => 'Hãy nhập password',
                    'password.min'              => 'Password phải lớn hơn 6 ký tự',
                    'password.max'              => 'Password phải ít hơn 32 ký tự' 
                ];
        $this->validate($request, $rules, $message);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('admin/theloai/danhsach')->with('thongbao', 'Đăng nhập thành công');
        }else{
            return redirect('admin/dangnhap')->with('error', 'Đăng nhập thất bại');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
