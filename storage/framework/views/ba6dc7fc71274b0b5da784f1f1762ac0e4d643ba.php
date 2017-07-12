<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				  		<?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				    	<form action="nguoidung" method="POST">
				    	<?php echo e(csrf_field()); ?>

				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="<?php echo e($nguoidung->name); ?>">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" readonly value="<?php echo e($nguoidung->email); ?>">
							</div>
							<br>	
							<div>
								<input type="checkbox" id="changePassword" name="checkPassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
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
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>