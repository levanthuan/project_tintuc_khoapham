<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="admin/theloai/them" method="POST">
                        <?php echo e(csrf_field()); ?>              
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <?php if($errors->first('Ten')): ?>
                                <div class="alert alert-danger"><?php echo $errors->first('Ten'); ?></div>
                            <?php endif; ?>
                            <input class="form-control" name="Ten" placeholder="Nhập tên thể loại" />
                        </div>
                        <button type="submit" class="btn btn-default">Thêm thể loại</button>
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