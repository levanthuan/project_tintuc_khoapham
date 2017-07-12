<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small><?php echo e($theloai->Ten); ?></small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="admin/theloai/sua/<?php echo e($theloai->id); ?>" method="POST">
                       <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="Ten" placeholder="Hãy nhập tên thể loại" value="<?php echo e($theloai->Ten); ?>" />
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>