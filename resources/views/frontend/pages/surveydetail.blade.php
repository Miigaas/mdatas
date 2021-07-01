@extends('frontend.layout.master')
@section('main-content')
<main>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">НҮҮР</a></li>
                <li><a href="#">{{$detail->cat_info->title}}</a></li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="box_general_2 add_bottom_45">
                    <div class="main_title_4">
                        <h3>{{$detail->title}}</h3>
                    </div>
                    <div class="row">
                    <table class="table">
                        <tbody>
                          <tr>
                            <td >Судалгааны дугаар</td>
                            <td>{{$detail->idno}}</td>
                            <td>Үүссэн огноо</td>
                            <td>{{$detail->created_at}}</td>
                          </tr>
                          <tr>
                            <td>Он</td>
                            <td>{{$detail->year_start}}</td>
                            <td>Сүүлд шинэчилсэн огноо</td>
                            <td>{{$detail->updated_at}}</td>
                          </tr>
                          <tr>
                            <td>Улс</td>
                            <td>{{$detail->nation}}</td>
                            <td></td>
                            <td>Хуудасны тоо</td>
                          </tr>
                          <tr>
                            <td>Гүйцэтгэгч</td>
                            <td>{{$detail->authoring_entity}}</td>
                            <td></td>
                            <td>Татагдсан тоо</td>
                          </tr>
                          <tr>
                            <td>Судалгаа</td>
                            <td>{{$detail->sub_cat_info->title}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Мета мэдээлэл</td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tabs_styled_2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true">Судалгааны тайлбар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Мэдээллийн толь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login.form')}}" role="tab" aria-controls="reviews1">Анхдагч мэдээлэл авах</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews2-tab" data-toggle="tab" href="#reviews2" role="tab" aria-controls="reviews">Холбоотой материалууд</a>
                        </li>
                    </ul>
                    <!--/nav-tabs -->

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="row">
                            <div class="col">
                                <hr>
                                  <load-page-component></load-page-component>
                            </div>
                            <div class="col-9">
                                <hr>
                                <p>{!! ($detail->review) !!}</p>
                            </div>
                            <div class="col-9" id="maincont">
                            </div>
                        </div>
                        </div>
                        <!-- /tab_2 -->

                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div id="review_summary">
                                            <strong>4.7</strong>
                                            <div class="rating">
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                            </div>
                                            <small>Based on 4 reviews</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                                <!-- /row -->

                                <hr>

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <div class="rev-info">
                                            Admin – April 03, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <div class="rev-info">
                                            Ahsan – April 01, 2016
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->

                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <div class="rev-info">
                                            Sara – March 31, 2016
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End review-box -->
                            </div>
                            <!-- End review-container -->
                            <hr>
                            <div class="text-right"><a href="submit-review.html" class="btn_1 add_bottom_15">Submit review</a></div>
                        </div>
                        <div class="tab-pane fade" id="reviews1" role="tabpanel" >
                            <div class="reviews-container">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews2" role="tabpanel" aria-labelledby="reviews2-tab">
                            <div class="reviews-container">
                                <div class="row">
                                    <div class="col-lg-11">
                                        <hr>
                                        <p>Асуултууд</p>
                                        <hr>
                                        <p> <a href="{{route('downloadFile',$detail->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="Мета мэдээлэл" class="badge_list_1"><img src="{{asset('frontend/img/pdf.png')}}" width="20" height="20" alt="">{{$detail->dirpath_id}}</a></p>
                                    </div>
                                     <hr>
                                     <div class="col-lg-11">
                                        <hr>
                                        <p>Хавсралт файл</p>
                                        <hr>
                                        <p> <a href="{{route('downloadFile',$detail->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="Мета мэдээлэл" class="badge_list_1"><img src="{{asset('frontend/img/pdf.png')}}" width="20" height="20" alt="">{{$detail->dirpath_id}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab_3 -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_styled -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .hidden>div {
	display:none;
}

.visible>div {
	display:block;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function loadwidget(1, 'formname', 1)
    {
        var widget_url = '<?php echo URL::to('widget'); ?>';

        $.ajax({
            type:'POST',
            url: widget_url+'/'+formname,
            dataType: "html",
            async: false,
            cache: false,
            success: function(response)
            {
                $('#'+divid).html(response);

                if(active==0)
                {
                    $('#'+divid+' :input').attr('disabled', true);
                }
            }
        });
        return true;
    }
    </script>
@endpush
