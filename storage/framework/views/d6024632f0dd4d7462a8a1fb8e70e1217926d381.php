<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo e($tintuc->TieuDe); ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/<?php echo e($tintuc->Hinh); ?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on 
                    <?php if($tintuc->updated_at != NULL): ?>
                        <?php echo e($tintuc->updated_at); ?>

                    <?php else: ?>
                        <?php echo e($tintuc->created_at); ?>

                    <?php endif; ?>
                </p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $tintuc->NoiDung; ?></p>

                <hr>

                <!-- Blog Comments -->
                <?php if(Auth::check()): ?>
                    <!-- Comments Form -->
                    <div class="well">
                        <?php echo $__env->make('errors.note', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" action="comment/<?php echo e($tintuc->id); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <textarea name="NoiDung" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                <?php endif; ?>
                <hr>

                <!-- Posted Comments -->
                <?php $__currentLoopData = $tintuc->comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo e($cm->user->name); ?>

                            <small>
                                <?php if($cm->updated_at != NULL): ?>
                                    <?php echo e($cm->updated_at); ?>

                                <?php else: ?>
                                    <?php echo e($cm->created_at); ?>

                                <?php endif; ?>                                
                            </small>
                        </h4>
                        <?php echo e($cm->NoiDung); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    <?php $__currentLoopData = $tinlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tinlq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="upload/tintuc/<?php echo e($tinlq->Hinh); ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/<?php echo e($tinlq->id); ?>/<?php echo e($tinlq->TieuDeKhongDau); ?>.html"><b><?php echo e($tinlq->TieuDe); ?></b></a>
                            </div>
                            <p style="padding-left: 5px"><?php echo e($tinlq->TomTat); ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    <?php $__currentLoopData = $tinnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tinnb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="upload/tintuc/<?php echo e($tinnb->Hinh); ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/<?php echo e($tinnb->id); ?>/<?php echo e($tinnb->TieuDeKhongDau); ?>.html"><b><?php echo e($tinnb->TieuDe); ?></b></a>
                            </div>
                            <p style="padding-left: 5px"><?php echo e($tinnb->TomTat); ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>