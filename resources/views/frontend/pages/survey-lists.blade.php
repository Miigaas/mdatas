@extends('frontend.layout.master')

@section('main-content')
<main>
    <div id="results">

        <!-- /container -->
    </div>
    <!-- /results -->

    <div class="filters_listing">
        <form action="{{route('survey.filter')}}" method="POST">
            @csrf
        <div class="container">
            <ul class="clearfix">
                <li>
                    <h6>Байршил</h6>
                    <div class="layout_view">
                        <a href="grid-list.html"><i class="icon-th"></i></a>
                        <a href="#0" class="active"><i class="icon-th-list"></i></a>
                    </div>
                </li>
                <li>
                    <h6>Эрэмбэлэх</h6>
                    <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                        <option value="">Анхдагч</option>
                        <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Гарчиг</option>
                        <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>
                    </select>
                </li>
            </ul>
        </div>
        </form>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">
<div class="col-lg-8">
        @foreach($surveys as $survey)
                <div class="strip_list wow fadeIn">

                    <figure>
                        <a href="detail-page.html"><img src="{{asset('frontend/img/database.png')}}" alt=""></a>
                    </figure>
                    <h3><a href="{{route('surveydetail',$survey->slug)}}">{{$survey->title}}</a></h3>
                    <p>Боловсруулсан: {{$survey->authoring_entity}}</p>
                    <p>Судалгаа: {{$survey->sub_cat_info->title}}</p>
                   <a href="{{route('download',$survey->id)}}" data-toggle="tooltip" data-placement="top" data-original-title="Мета мэдээлэл" class="badge_list_1"><img src="{{asset('frontend/img/pdf.png')}}" width="20" height="20" alt="">  Метадата файл татах</a>
                </div>
                @endforeach

                <!-- /pagination -->
            </div>
            <aside class="col-lg-4">
                <div class="widget">
                    <form method="POST" action="{{route('survey.search')}}">
                        @csrf
                        <div class="form-group">
                            <input type="search" name="search" id="search" class="form-control" placeholder="Хайх...">
                        </div>
                        <button type="submit" id="submit" class="btn_1">Хайх</button>
                    </form>
                </div>
                <hr>
                @php
                                // $category = new Category();
                                $menu=App\Category::getAllParentWithChild();
                            @endphp
                            @if($menu)
                                @foreach($menu as $cat_info)
                                        @if($cat_info->child_cat->count()>0)
                <div class="widget">
                    <div class="widget-title">
                        <hr>
                        <h4> {{$cat_info->title}}</h4>
                    </div>
                    <ul class="cats">
                         @foreach($cat_info->child_cat as $sub_menu)
                           <li><a href="{{route('survey-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                          @endforeach
                          @else
                          <li><a href="{{route('survey-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
                          @endif
                          @endforeach
                            </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->
			<!-- Modal end -->
@endsection
