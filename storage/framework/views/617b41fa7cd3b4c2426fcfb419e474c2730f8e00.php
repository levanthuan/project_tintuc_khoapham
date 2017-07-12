<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Danh sách</small>
                    </h1>
                </div>
                <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Nội dung</th>
                            <th>Hình</th>
                            <th>Link</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($sd->id); ?></td>
                            <td><?php echo e($sd->Ten); ?></td>
                            <td><?php echo e($sd->NoiDung); ?></td>
                            <td>
                                <img width="200px" height="100px" src="upload/slide/<?php echo e($sd->Hinh); ?>">
                            </td>
                            <td><?php echo e($sd->link); ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/<?php echo e($sd->id); ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/<?php echo e($sd->id); ?>">Edit</a></td>
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