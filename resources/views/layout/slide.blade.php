    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $dem = 0;?>
                        @foreach($slide as $sd)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$dem}}" 
                                @if($dem == 0)
                                    class="active"
                                @endif
                            ></li>
                            <?php $dem++; ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <?php $dem = 0;?>
                        @foreach($slide as $sd)
                            <div
                                @if($dem == 0)
                                    class="item active"
                                @else
                                    class="item"
                                @endif
                            >
                                <img class="slide-image" src="upload/slide/{{$sd->Hinh}}" alt="">
                            </div>
                            <?php $dem++; ?>
                        @endforeach
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