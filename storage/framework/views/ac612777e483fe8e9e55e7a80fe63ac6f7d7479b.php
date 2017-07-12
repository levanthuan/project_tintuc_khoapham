    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $dem = 0;?>
                        <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($dem); ?>" 
                                <?php if($dem == 0): ?>
                                    class="active"
                                <?php endif; ?>
                            ></li>
                            <?php $dem++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php $dem = 0;?>
                        <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                <?php if($dem == 0): ?>
                                    class="item active"
                                <?php else: ?>
                                    class="item"
                                <?php endif; ?>
                            >
                                <img class="slide-image" src="upload/slide/<?php echo e($sd->Hinh); ?>" alt="">
                            </div>
                            <?php $dem++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->