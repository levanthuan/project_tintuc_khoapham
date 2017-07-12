<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php echo $__env->make('layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php 
                function doimau($str, $tukhoa){
                    return str_replace($tukhoa, "<span style='color:red'>$tukhoa</span>", $str);
                }
            ?>
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Kết quả tìm kiếm từ khóa: <?php echo e($tukhoa); ?></b></h4>
                    </div>
                    <?php $__currentLoopData = $tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="detail.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/<?php echo e($tt->Hinh); ?>" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><?php echo doimau($tt->TieuDe, $tukhoa); ?></h3>
                                <p><?php echo doimau($tt->TomTat, $tukhoa); ?></p>
                                <a class="btn btn-primary" href="detail.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div align="center"><?php echo e($tintuc->links()); ?></div>                    
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>