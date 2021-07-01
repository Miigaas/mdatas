@extends('backend.layout.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Дата файл нэмэх</h5>
    <div class="card-body">
        @if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
      <form method="post" action="{{route('file.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="input-group hdtuto control-group lst increment" >
            <input type="file" name="filenames[]" class="myfrm form-control" >
            <div class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Нэмэх</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
              <input type="file" name="filenames[]" class="myfrm form-control">
              <div class="input-group-btn">
                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Устгах</button>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success" style="margin-top:10px">Хадгалах</button>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".hdtuto control-group lst").remove();
      });
    });
</script>
<script>


    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 120
      });
    });
</script>

<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
@endpush
