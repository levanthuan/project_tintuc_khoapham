<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                                  
                        <form action="admin/slide/sua/<?php echo e($slide->id); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>                                                
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên slide" value="<?php echo e($slide->Ten); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung"><?php echo e($slide->NoiDung); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhập link" value="<?php echo e($slide->link); ?>" />
                            </div>    
                            <div class="form-group">
                                <label>Hình ảnh
                                    <img width="200px" height="100px" src="upload/slide/<?php echo e($slide->Hinh); ?>">
                                </label>
                                
                                <input type="file" name="Hinh" class="form-control">
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
    </div>
    <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>