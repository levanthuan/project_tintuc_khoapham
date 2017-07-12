<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $__env->yieldContent('errors.note'); ?>                   
                    <form action="admin/user/sua/<?php echo e($user->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Tên user</label>
                            <input class="form-control" name="name" placeholder="Hãy nhập tên người dùng.." value="<?php echo e($user->name); ?>" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Hãy nhập địa chỉ email.." value="<?php echo e($user->email); ?>" readonly="" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="changePassword" name="changePassword">
                            <label>Đổi Password</label>
                            <input class="form-control password" type="password" name="password" placeholder="Hãy nhập Password.." disabled="" />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control password" type="password" name="passwordAgain" placeholder="Hãy lại nhập Password.." disabled="" />
                        </div>
                        <div class="form-group">
                            <label>Quyền người dùng</label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio"
                                    <?php if($user->quyen == 1): ?>
                                        <?php echo e('checked'); ?>

                                    <?php endif; ?>
                                >Admin
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" type="radio"
                                    <?php if($user->quyen == 0): ?>
                                        <?php echo e('checked'); ?>

                                    <?php endif; ?>                                
                                >Người dùng
                            </label>
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

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>