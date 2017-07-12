@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on 
                    @if($tintuc->updated_at != NULL)
                        {{$tintuc->updated_at}}
                    @else
                        {{$tintuc->created_at}}
                    @endif
                </p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$tintuc->NoiDung!!}</p>

                <hr>

                <!-- Blog Comments -->
                @if(Auth::check())
                    <!-- Comments Form -->
                    <div class="well">
                        @include('errors.note')
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form role="form" action="comment/{{$tintuc->id}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="NoiDung" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                @endif
                <hr>

                <!-- Posted Comments -->
                @foreach($tintuc->comment as $cm)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>
                                @if($cm->updated_at != NULL)
                                    {{$cm->updated_at}}
                                @else
                                    {{$cm->created_at}}
                                @endif                                
                            </small>
                        </h4>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    @foreach($tinlienquan as $tinlq)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tinlq->id}}/{{$tinlq->TieuDeKhongDau}}.html"><b>{{$tinlq->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px">{{$tinlq->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    @foreach($tinnoibat as $tinnb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tinnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tinnb->id}}/{{$tinnb->TieuDeKhongDau}}.html"><b>{{$tinnb->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px">{{$tinnb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection