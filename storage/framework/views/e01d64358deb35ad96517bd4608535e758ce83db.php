<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Danh sách</small>
                    </h1>
                </div>
               <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                 
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên User</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($us->id); ?></td>
                            <td><?php echo e($us->name); ?></td>
                            <td><?php echo e($us->email); ?></td>                            
                            <td>
                                <?php if($us->quyen == '1'): ?>
                                    <?php echo e('Admin'); ?>

                                <?php else: ?>
                                    <?php echo e('Người dùng'); ?>

                                <?php endif; ?>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/<?php echo e($us->id); ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/<?php echo e($us->id); ?>">Edit</a></td>
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
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>