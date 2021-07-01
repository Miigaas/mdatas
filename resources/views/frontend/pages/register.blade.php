@extends('frontend.layout.master')
@section('main-content')
<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>Шинээр бүртгүүлэх</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form method="post" action="{{route('register.submit')}}">
                            @csrf
                            <div class="box_form">
                                <div class="form-group">
                                    <label>Нэр</label>
                                    <input type="text" class="form-control"  name="name" placeholder="Нэр" required="required" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>И-мэйл</label>
                                    <input type="email"  name="email" class="form-control" placeholder="Таны и-мэйл хаяг" required="required" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label>Нууц үг</label>
                                    <input type="password" class="form-control" id="password1" name="password" placeholder="Таны нууц үг" required="required" value="{{old('password')}}">
                                </div>
                                <div class="form-group">
                                    <label>Нууц үг давтах</label>
                                    <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Нууц үг давтах" required="required" value="{{old('password_confirmation')}}">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <div class="form-group text-center add_top_30">
                                    <input class="btn_1" type="submit" value="Нэвтрэх">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /register -->
        </div>
    </div>
</main>
<!-- /main -->
@endsection
