<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small><?php echo e($tintuc->TieuDe); ?></small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($err); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    </div>
                <?php endif; ?>
                <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>     
                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>                              
                    <form action="admin/tintuc/sua/<?php echo e($tintuc->id); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                <option 
                                    <?php if($tl->id == $tintuc->loaitin->theloai->id): ?> 
                                        <?php echo e("selected"); ?>

                                    <?php endif; ?>
                                value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="LoaiTin" id="LoaiTin">
                            <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                <option 
                                    <?php if($lt->id == $tintuc->loaitin->id): ?>
                                        <?php echo e("selected"); ?>

                                    <?php endif; ?>
                                value="<?php echo e($lt->id); ?>"><?php echo e($lt->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="<?php echo e($tintuc->TieuDe); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat"><?php echo e($tintuc->TomTat); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung"><?php echo e($tintuc->NoiDung); ?></textarea>
                        </div>           
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <img width="100px" height="100px" src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>">
                            <input type="file" name="Hinh" class="form-control">
                        </div>                                       
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" checked="" 
                                <?php if($tintuc->NoiBat == 0): ?>
                                    <?php echo e("checked"); ?>

                                <?php endif; ?>
                                type="radio">Không
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" 
                                <?php if($tintuc->NoiBat == 1): ?>
                                    <?php echo e("checked"); ?>

                                <?php endif; ?>                                
                                type="radio">Có
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>                     
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Người dùng</th>
                            <th>Nội dung</th>
                            <th>Ngày comment</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($cm->id); ?></td>
                            <td><?php echo e($cm->user->name); ?></td>
                            <td><?php echo e($cm->NoiDung); ?></td>
                            <td><?php echo e($cm->created_at); ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/<?php echo e($cm->id); ?>/<?php echo e($tintuc->id); ?>"> Delete</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>     
            <!-- /.row -->            
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">     // Xử lý bằng ajax
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai, function(data){                  
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>