@extends('backend.layout.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Судалгаа нэмэх</h5>
    <div class="card-body">
      <form method="post" action="{{route('survey.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Гарчиг <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Гарчиг"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Судалгааны дугаар <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="idno" placeholder="Судалгааны дугаар"  value="{{old('idno')}}" class="form-control">
            @error('idno')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Улс <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="nation" placeholder=""  value="{{old('nation')}}" class="form-control">
            @error('nation')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Гүйцэтгэгч <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="authoring_entity" placeholder=""  value="{{old('authoring_entity')}}" class="form-control">
          @error('authoring_entity')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Огноо <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="year_start" placeholder=""  value="{{old('year_start')}}" class="form-control">
            @error('year_start')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group">
          <label for="summary" class="col-form-label">Тойм <span class="text-danger">*</span></label>
          <textarea class="form-control" id="review" name="review">{{old('review')}}</textarea>
          @error('review')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Түүвэрлэлт</label>
          <textarea class="form-control" id="sampling" name="sampling">{{old('sampling')}}</textarea>
        </div>
        <div class="form-group">
            <label for="description" class="col-form-label">Мэдээлэл цуглуулалт</label>
            <textarea class="form-control" id="data_collection" name="data_collection">{{old('data_collection')}}</textarea>
            @error('data_collection')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Мэдээлэл боловсруулалт</label>
            <textarea class="form-control" id="data_processing" name="data_processing">{{old('data_processing')}}</textarea>
            @error('data_processing')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">Ангилал <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--ангиллыг сонгоно уу--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">Дэд ангилал</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Select any category--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach --}}
          </select>
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Файл <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Сонгох
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo[]" value="{{old('dirpath_id')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('dirpath')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Статус <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Идэвхитэй</option>
              <option value="inactive">Идэвхигүй</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Дахин тохируулах</button>
           <button class="btn btn-success" type="submit">Нэмэх</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('file');

    $(document).ready(function() {
      $('#review').summernote({
        placeholder: "Тайлбар бичнэ үү....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#sampling').summernote({
        placeholder: "Тайлбар бичнэ үү.....",
          tabsize: 2,
          height: 150
      });
    });
    $(document).ready(function() {
      $('#data_collection').summernote({
        placeholder: "Тайлбар бичнэ үү.....",
          tabsize: 2,
          height: 150
      });
    });
    $(document).ready(function() {
      $('#data_processing').summernote({
        placeholder: "Тайлбар бичнэ үү.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  });
</script>
<script>
    $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
</script>
<style>
    .ui-datepicker-calendar {
    display: none;
    }
</style>
@endpush


