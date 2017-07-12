<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                              
                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                            <?php $__currentLoopData = $theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tl->id); ?>"><?php echo e($tl->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="LoaiTin" id="LoaiTin">
                            <?php $__currentLoopData = $loaitin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lt->id); ?>"><?php echo e($lt->Ten); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung"></textarea>
                        </div>           
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="Hinh" class="form-control">
                        </div>                                       
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" checked="" type="radio">Không
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" type="radio">Có
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
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