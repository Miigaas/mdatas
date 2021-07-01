<footer>
    <div class="container margin_60_35">
        <hr>
        <div class="row">
            <div class="col-md-8">
                <ul id="additional_links">
                    <li><a href="#0">Үндэсний Статистикийн Хороо</a></li>
                    <li><a href="#0">www.1212.mn</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div id="copy">© 2021 Микро мэдээллийн сан</div>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->

<div id="toTop"></div>
<!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontend/js/common_scripts.min.js')}}"></script>
<script src="{{asset('frontend/js/functions.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('frontend/js/video_header.jss')}}"></script>
<script>
    'use strict';
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>
