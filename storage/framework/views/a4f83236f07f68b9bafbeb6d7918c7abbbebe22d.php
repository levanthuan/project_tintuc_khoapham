<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="admin/user/them" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Tên user</label>
                            <input class="form-control" name="name" placeholder="Hãy nhập tên người dùng.." />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Hãy nhập địa chỉ email.." />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Hãy nhập Password.." />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control" type="password" name="passwordAgain" placeholder="Hãy lại nhập Password.." />
                        </div>
                        <div class="form-group">
                            <label>Quyền người dùng</label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked="" type="radio">Người dùng
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
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>