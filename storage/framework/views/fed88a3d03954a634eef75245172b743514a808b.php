<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>                     
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Tóm tắt</th>
                            <th>Thể loại</th>
                            <th>Loại tin</th>
                            <th>Xem</th>
                            <th>Nổi bật</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo e($tt->id); ?></td>
                            <td>
                                <img width="100px" height="50px" src="upload/tintuc/<?php echo e($tt->Hinh); ?>">
                                <p><?php echo e($tt->TieuDe); ?></p>
                            </td>
                            <td><?php echo e($tt->TomTat); ?></td>
                            <td><?php echo e($tt->loaitin->theloai->Ten); ?></td>
                            <td><?php echo e($tt->loaitin->Ten); ?></td>
                            <td><?php echo e($tt->SoLuotXem); ?></td>
                            <td>
                                <?php if($tt->NoiBat == 0): ?>
                                    <?php echo e('Không'); ?>

                                <?php else: ?>
                                    <?php echo e('Có'); ?>

                                <?php endif; ?>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/<?php echo e($tt->id); ?>"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/<?php echo e($tt->id); ?>">Edit</a></td>
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