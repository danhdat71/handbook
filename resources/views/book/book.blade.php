<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/fixed/logo.png" type="image/x-icon" />
    <meta property="og:title" content="{{$config->description}}">
    <meta property="og:description" content="{{$config->description}}">
    <meta name="description" content="{{$config->description}}">
    <meta property="og:image" content="{{env('APP_URL') . "/" . $book[0]->slider_image}}">
    <meta name="keywords" content="{{$config->description}}">
    <meta property="og:site_name" content="{{env('APP_URL')}}"/>
    <meta property="og:url" content="{{env('APP_URL')}}"/>
    <meta name="robots" content="index,follow"/>
    <link rel="canonical" href="{{env('APP_URL')}}"/>
    <meta name="revisit-after" content="1 days"/>
    <title>{{$config->title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="book_vendor/css.css">
</head>
<body>
    <div class="wraper">
        <div id="wrap-logo">
            <img src="image/fixed/logo.png" alt="">
        </div>
        <div id="background-site">
            <img src="{{$config->background}}" alt="">
        </div>
        <div id="left-right-wrap">
            <button class="left">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="right">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div id="book" class="flipbook">
            @foreach ($book as $item)
                <div class="item">
                    <img class="big-image" data-src="{{$item->big_image}}" alt="">
                    <img class="thumb-image" src="{{$item->thumb_image}}" alt="">
                </div>
            @endforeach
        </div>
        <div id="slider">
            <button id="close-slider"><i class="fa-solid fa-chevron-down"></i></button>
            <div class="swiper slider-page">
                <div class="swiper-wrapper">
                    @foreach($book as $item)
                    <div data-page="{{$item->order}}" class="swiper-slide @if($item->order == 1){{"active"}}@endif">
                        <div class="wrap-image">
                            <img class="swiper-lazy" src="https://i.gifer.com/R5mG.gif" data-src="{{$item->slider_image}}" alt="">
                        </div>
                        <p>Trang {{$item->order}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="control">
            <div class="left">
                <button id="first-button"><i class="fa-solid fa-backward-fast"></i></button>
                <button id="prev-button"><i class="fa-solid fa-backward"></i></button>
                <input id="current-page" type="text">
                <button id="next-button"><i class="fa-solid fa-forward"></i></button>
                <button id="finish-button"><i class="fa-solid fa-forward-fast"></i></button>
            </div>
            <div class="right">
                <button id="show-list-page" title="Hiện danh sách trang"><i class="fa-solid fa-align-left"></i></button>
                <button id="volume" title="Điều chỉnh âm lượng">
                    <i class="fa-solid fa-volume-high"></i>
                    <i class="fa-solid fa-volume-xmark d-none"></i>
                </button>
                <button id="fullscreen" title="Full màn hình">
                    <i class="fa-solid fa-expand"></i>
                </button>
                <button title="Gọi điện"><i class="fa-solid fa-phone-flip"></i></button>
                <button title="Trang chủ"><i class="fa-solid fa-earth-africa"></i></button>
            </div>
        </div>
    </div>

    <div id="config-field">
        <input type="hidden" id="book_width" value="{{$config->book_width}}">
        <input type="hidden" id="book_height" value="{{$config->book_height}}">
        <input type="hidden" id="speed" value="{{$config->speed}}">
        <input type="hidden" id="gradient" value="@if($config->gradient == 1){{"true"}}@else{{"false"}} @endif">
        <input type="hidden" id="auto_center" value="true">
        <input type="hidden" id="audio_src" value="{{$config->background_sound}}">
        <input type="hidden" id="flip_sound" value="sound/fixed/flip3.mp3">
    </div>
    <audio controls autoplay style="opacity: 0" id="audio">
        <source src="{{$config->background_sound}}" type="audio/mpeg">
    </audio>
</body>
<script src="http://tuyensinh.vnkgu.edu.vn/book/JS/jquery.js"></script>
<script src="http://tuyensinh.vnkgu.edu.vn/book/JS/turn.js"></script>
<script src="https://lab.hakim.se/zoom-js/js/zoom.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="book_vendor/js.js"></script>
</html>