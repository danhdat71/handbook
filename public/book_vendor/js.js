document.addEventListener('DOMContentLoaded', function() {
    // Set up chuẩn bị khởi chạy book
    let currentPage = 0;
    let windowWidth = $(window).width();
    let book = $('#book');
    let currentPageObj = $('#current-page');
    let nextBtn = $('#next-button');
    let prevBtn = $('#prev-button');
    let firstBtn = $('#first-button');
    let finishBtn = $('#finish-button');
    let volumnBtn = $('#volume');
    let sliderItem = $('#slider').find('.swiper-slide');
    let showSliderBtn = $('#show-list-page');
    let closeSlider = $('#close-slider');
    let slider = $('#slider');
    let fullScreenBtn = $('#fullscreen');
    let audioObj = document.getElementById("audio");
    let config = {
        autoCenter: $('#auto_center').val(),
        height: $('#book_height').val(),
        width: $('#book_width').val(),
        gradients: !$.isTouch,
        duration: $('#speed').val(),
        elevation: 50,
        inclination: 100,
        when: {
            turn: function(e, page) {
                let flipAudio = new Audio($('#flip_sound').val());
                flipAudio.play();
                audioObj.loop = true;
                audioObj.play();
                currentPageObj.val(book.turn('view'));

                if (page > 1) {
                    for (let i = page; i <= page + 3; i++) {
                        let pageWrapper = $('.page-wrapper[page=' + i + "]");
                        let dataSrc = pageWrapper.find('img.big-image').attr('data-src');
                        //pageWrapper.find('img.thumb-image').fadeOut(100);
                        pageWrapper.find('img.big-image').attr('src', dataSrc);
                        // let imageObj = new Image();
                        // imageObj.src = dataSrc;
                        // imageObj.onload = function(){
                        //     pageWrapper.find('img.thumb-image').fadeOut(100);
                        //     pageWrapper.find('img.big-image').attr('src', dataSrc);
                        // }
                        console.log("Trang đang vào tiến trình tải: " + (i + 1));
                    }
                }
            },
            turned: function(e, page) {
                console.log("Trang hiện tại: " + page);
                if (page <= 1) {
                    for (let i = 1; i <= 3; i++) {
                        let pageWrapper = $('.page-wrapper[page="' + i + '"]');
                        let dataSrc = $('.page-wrapper[page="' + i + '"]').find('img.big-image').attr('data-src');
                        //pageWrapper.find('img.thumb-image').fadeOut(100);
                        pageWrapper.find('img.big-image').attr('src', dataSrc);
                    }
                }
            }
        }
    };
    if (windowWidth <= 425) {
        config.display = 'single';
        config.width = '100%';
    }
    book.turn(config);
    $("#book").css({
        'transform': 'translate(-50%, -50%)'
    });

    //Chuyển trang khi click
    $(window).click(function(e) {
        let center = $(window).width() / 2;
        // Check trái phải màn hình
        (e.pageX > center) ? book.turn('next'): book.turn('previous');
    });
    $('#book, #control, #slider').click(function(e) {
        e.stopPropagation();
    });

    //Chuyển trang khi scroll
    $(window).on('mousewheel', function(e) {
        (e.originalEvent.wheelDelta >= 0) ? book.turn('previous'): book.turn('next');
    });
    $('#slider').on('mousewheel', function(e) {
        e.stopPropagation();
    });

    //Chuyển trang khi click slider
    sliderItem.click(function() {
        sliderItem.removeClass('active');
        $(this).addClass('active');
        book.turn('page', $(this).attr('data-page'));
    });

    //Zoom màn hình
    book.on('dblclick', function(event) {
        zoom.to({
            element: document.getElementById('book')
        });
    });

    //Xử lý swiper
    var swiper = new Swiper(".slider-page", {
        slidesPerView: 6,
        spaceBetween: 20,
        centeredSlides: true,
        preloadImages: false,
        lazy: {
            checkInView: true,
            loadOnTransitionStart: true,
            enabled: true,
            loadPrevNext: true
        },
        slideToClickedSlide: true
    });

    //Hiện slider
    showSliderBtn.click(function() {
        slider.css({
            'top': '50%'
        });
        for (i = 0; i < 4; i++) {
            swiper.lazy.loadInSlide(i);
        }
    });

    //Đóng slider
    closeSlider.click(function() {
        slider.css({
            'top': '150%'
        });
    });

    //Xử lý thanh control
    currentPageObj.on('input', function() {
        book.turn('page', parseInt($(this).val()));
    });
    nextBtn.on('click', function() { book.turn('next') });
    prevBtn.on('click', function() { book.turn('previous') });
    firstBtn.on('click', function() { book.turn('page', 1) });
    finishBtn.on('click', function() {
        book.turn('page', book.turn('pages'));
    });
    volumnBtn.click(function() {
        $('.fa-volume-high, .fa-volume-xmark').removeClass('d-none');
        if (audioObj.muted == false) {
            $('.fa-volume-high').addClass('d-none');
            audioObj.muted = true;
        } else {
            $('.fa-volume-xmark').addClass('d-none');
            audioObj.muted = false;
        }
    });
    fullScreenBtn.click(function() {
        toggleFullScreen();
    });

    let firstTouch = 0;
    let endTouch = 0;
    book.on('pointerdown', function(e) {
        firstTouch = e.pageX;
        //console.log(firstTouch);
    });
    book.on('touchmove', function(e) {
        var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
        endTouch = touch.pageX;
        //console.log(endTouch);
    });
    book.on('touchend', function() {
        endTouch < firstTouch ? book.turn('next') : book.turn('previous');
    });

    function cancelFullScreen() {
        var el = document;
        var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el.exitFullscreen || el.webkitExitFullscreen;
        if (requestMethod) {
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") {
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

    function requestFullScreen(el) {
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

        if (requestMethod) {
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
        return false
    }

    function toggleFullScreen(el) {
        if (!el) {
            el = document.body;
        }
        var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) || (document.mozFullScreen || document.webkitIsFullScreen);

        if (isInFullScreen) {
            cancelFullScreen();
        } else {
            requestFullScreen(el);
        }
        return false;
    }
});