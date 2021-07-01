@extends('backend.layout.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Ангилал засах</h5>
    <div class="card-body">
      <form method="post" action="{{route('file.update',$files->id)}}">
        @csrf
        @method('PATCH')
        <div class="input-group hdtuto control-group lst increment" >
            <input type="file" name="filenames[]" class="myfrm form-control"  >
            <div class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Нэмэх</button>
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
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
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
