@extends('frontend.layout.master')
@section('main-content')
<div class="product-info">
    <div class="nav-main">
        <!-- Tab Nav -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Судалгааны тайлбар</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dictionary" role="tab">Мэдээллийн толь</a></li>
            <li class="nav-item"><a class="nav-link"  href="{{route('login.form')}}" role="tab">Анхдагч мэдээлэл авах</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#material" role="tab">Холбоотой материалууд</a></li>
        </ul>
        <!--/ End Tab Nav -->
    </div>
    <div class="tab-content" id="myTabContent">
        <!-- Description Tab -->
        <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="tab-single">
                <div class="row">
                    <div class="col-12">
                        <div class="single-des">
                            <hr>
                            <div class="row">
                                <div class="col-1 col-md-3">
                                    <ul class="list-group">
                                        <li class="list-group-item  justify-content-right">
                                         <a href="" >Тойм</a>
                                        </li>
                                        <li class="list-group-item  justify-content-right">
                                           <a href="" id="button">Түүвэрлэлт</a>
                                          </li>
                                          <li class="list-group-item  justify-content-right">
                                            Мэдээлэл цуглуулалт
                                          </li>
                                          <li class="list-group-item  justify-content-right">
                                            Мэдээлэл боловсруулалт
                                          </li>
                                      </ul>
                                </div>
                                <div id="div1" class="col-12 col-md-8" >{!! ($detail->sampling) !!}</div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Description Tab -->
        <!-- Reviews Tab -->
        <div class="tab-pane fade" id="dictionary" role="tabpanel">
            <div class="tab-single review-panel">
                <div class="row">
                    <div class="col-12">

                        <!-- Review -->
                        <div class="comment-review">
                            <div class="add-review">
                                <h5></h5>
                                <p>Your email address will not be published. Required fields are marked</p>
                            </div>
                            <h4>Your Rating <span class="text-danger">*</span></h4>
                            <div class="review-inner">

                            </div>
                        </div>

                        <!--/ End Review -->

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel">
            <div class="tab-single review-panel">
                <div class="row">
                    <div class="col-12">

                        <!-- Review -->
                        <div class="comment-review">
                            <div class="add-review">
                                <h5></h5>
                                <p>Your email address will not be published. Required fields are marked</p>
                            </div>
                        </div>

                        <!--/ End Review -->

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="material" role="tabpanel">
            <div class="tab-single review-panel">
                <div class="row">
                    <div class="col-12">
                        <div class="comment-review">
                            <hr>
                            <div class="add-review">
                                <h5>Судалгааны баримт бичиг</h5>
                            </div>
                            <hr>
                            <div class="review-inner">
                              <h2>Асуулгууд</h2>
                              <a href="{{route('downloadFile', $detail->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="{{$detail->dirpath}}" class="badge_list_1"><img src="{{asset('frontend/img/pdf.png')}}" width="20" height="20" alt=""></a>
                            </div>
                            <hr>
                        </div>

                        <!--/ End Review -->

                    </div>
                </div>
            </div>
        </div>
        <!--/ End Reviews Tab -->
    </div>
</div>
@endsection
