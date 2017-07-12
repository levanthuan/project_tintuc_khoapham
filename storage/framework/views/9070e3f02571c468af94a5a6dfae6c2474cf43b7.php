<?php $__env->startSection('content'); ?>
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
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>        
                    <form action="admin/loaitin/sua/<?php echo e($loaitin->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Tên loại tin</label>
                            <input class="form-control" name="Ten" placeholder="Hãy nhập tên loại tin" value="<?php echo e($loaitin->Ten); ?>" />
                        </div>                    
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai">
                                <?php $__currentLoopData = $all_theloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option 
                                        <?php if($all_tl->id == $loaitin->idTheLoai): ?>
                                            <?php echo e("selected"); ?> 
                                        <?php endif; ?>                                  
                                    value="<?php echo e($all_tl->id); ?>"><?php echo e($all_tl->Ten); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>