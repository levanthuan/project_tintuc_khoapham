<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Comment;
use Validator;

class CommentController extends Controller
{
    public function getXoa($id, $idTinTuc){
    	$comment = Comment::find($id);
    	$comment->delete();

    	return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Bạn đã xóa comment thành công');
    }

    public function postComment(CommentRequest $request, $id){
    	$comment = new Comment;
    	$comment->idTinTuc = $id;
    	$comment->idUser = Auth::user()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();

    	return redirect('tintuc/'.$id.'/'.$comment->tintuc->TieuDeKhongDau.'.html');
    }
}
