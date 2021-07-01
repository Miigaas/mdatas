@extends('frontend.layout.master')
@section('main-content')
<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login">
                <h1>Микро мэдээллийн санд нэвтэрнэ үү!</h1>
                <div class="box_form">
                    <form method="post" action="{{route('login.submit')}}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Таны и-мэйл хаяг" required="required" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Таны нууц үг" name="password" id="password" required="required" value="{{old('password')}}">
                            @error('password')
                                        <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.reset') }}"><small>Нууц үгээ мартсан бол?</small></a>
                        @endif
                        <div class="form-group text-center add_top_20">
                            <input class="btn_1 medium" type="submit" value="Нэвтрэх">
                        </div>
                    </form>
                </div>
                <p class="text-center link_bright"><a href="{{route('register.form')}}"><strong>Шинээр бүртгүүлэх бол</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
</main>
<!-- /main -->
@endsection
