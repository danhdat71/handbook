let formBackground = $('#form-background');
let changeBackgroundInput = $('#form-background .change-background');
let backgroundProcessBar = $('#form-background .progress-bar');
let loadFrameBackground = $('#form-background .load-frame-background');
let percentNumberBackground = $('#form-background .percen');
let previewImageBackground = $('#form-background .preview-image');
let inputBackground = $('#form-background input');
let wrapSoundInput = $('#wrap-sound-bg input');
let loadFrameSound = $('#wrap-sound-bg .load-frame-sound');
let soundBackgroundBar = $('#wrap-sound-bg .load-bar span');
let percentNumberSound = $('#wrap-sound-bg .percen');
let audioControl = $('#wrap-sound-bg .control-audio');
let configError = {
    position: 'top',
    title: ``,
    padding: '0',
    background: 'red',
    padding: '0',
    backdrop: '#ffffff00',
    color: '#fff',
    timer: 3000,
    showConfirmButton: false,
}

changeBackgroundInput.change(function(){
    let formDataBackground = new FormData($('#form-background')[0]);
    inputBackground.prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
                loadFrameBackground.removeClass('d-none');
                backgroundProcessBar.css({
                    'width' : percentComplete + "%"
                });
                percentNumberBackground.text(percentComplete+"%");
              }
            }, false);

            return xhr;
        },
        url: '/change-background',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formDataBackground,
        type: 'post',
        success: function (res) {
            console.log(res);
            let html = ``;
            if(res.status == false){
                inputBackground.prop('disabled', false);
                res.messages.background.forEach(element => {
                    html+= `<h5 style='color:white;'>" ${element} "</h5>`;
                    configError.html = html
                });
                Swal.fire(configError);
                loadFrameBackground.addClass('d-none');
                previewImageBackground.attr('src', 'image/fixed/bg_eximage.jpg');
            }else{
                inputBackground.prop('disabled', false);
                loadFrameBackground.addClass('d-none');
            }
        }
    });
});

wrapSoundInput.change(function(){
    let formDataSound = new FormData($('#wrap-sound-bg')[0]);
    wrapSoundInput.prop('disabled', true);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
                loadFrameSound.removeClass('d-none');
                soundBackgroundBar.css({
                    'width' : percentComplete + "%"
                });
                percentNumberSound.text(percentComplete+"%");
              }
            }, false);

            return xhr;
        },
        url: '/change-sound',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formDataSound,
        type: 'post',
        success: function (res) {
            console.log(res);
            let html = ``;
            if(res.status == false){
                wrapSoundInput.prop('disabled', false);
                res.messages.background_sound.forEach(element => {
                    html+= `<h5 style='color:white;'>" ${element} "</h5>`;
                    configError.html = html
                });
                Swal.fire(configError);
                loadFrameSound.addClass('d-none');
            }else{
                wrapSoundInput.prop('disabled', false);
                loadFrameSound.addClass('d-none');
                audioControl.attr('src', res.messages.background_sound);
            }
        }
    });
});


$('.row-config').find('input, select').change(function(){
    let formData = new FormData();
    formData.append($(this).attr('name'), $(this).val());
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        type: "post",
        url: "config",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (res) {
            let html = ``;
            if(res.status == false){
                let messages = res.messages;
                for(var propertyName in messages) {
                    let msgArray = messages[propertyName];
                    msgArray.forEach(element => {
                        html+= `<h5 style='color:white;'>${element}</h5>`;
                        configError.html = html
                    });
                }
                Swal.fire(configError);
            }
        }
    });
});