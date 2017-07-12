@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại tin
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                @include('errors.note')        
                    <form action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên loại tin</label>
                            <input class="form-control" name="Ten" placeholder="Hãy nhập tên loại tin" value="{{$loaitin->Ten}}" />
                        </div>                    
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai">
                                @foreach($all_theloai as $all_tl)
                                    <option 
                                        @if($all_tl->id == $loaitin->idTheLoai)
                                            {{"selected"}} 
                                        @endif                                  
                                    value="{{$all_tl->id}}">{{$all_tl->Ten}}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                    
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection