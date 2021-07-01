@extends('frontend.layout.master')
@section('main-content')
<div class="hero_home version_2">
    <div class="content">    </div>
  </div>
<div class="container margin_120_95">
    <div class="content">
					<form method="post" action="{{route('survey.search')}}">
                        @csrf
						<div id="custom-search-input">
							<div class="input-group">
								<input type="search" class=" search-query" placeholder=" Хайх үгээ оруул...">
								<input type="submit" class="btn_search" value="ХАЙХ">

                            </div>
						</div>
					</form>
				</div>
    @php
    // $category = new Category();
    $menu=App\Category::getAllParentWithChild();
         @endphp
          @if($menu)
    @foreach($menu as $cat_info)
    @if($cat_info->child_cat->count()>0)
    <div class="col">
        <br>
    <hr>
    <h5>{{$cat_info->title}}</h5>
    <hr>
    </div>

    <div class="row">
                @foreach($cat_info->child_cat as $sub_menu)
        <div class="col-lg-4 col-md-6">
            <a class="box_feat_about" href="{{route('survey-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">
                @if($sub_menu->photo)
                            <img src="{{asset('storage/photos/1/' . $sub_menu->photo)}}" class="img-fluid" style="max-width:80px" >
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif

                <h3> <br>{{$sub_menu->title}}</h3>
            </a>
        </div>
        @endforeach
        @else
		@endif
		@endforeach
	@endif
    </div>
    <!-- /row -->
</div>
<!-- /container -->

@endsection
