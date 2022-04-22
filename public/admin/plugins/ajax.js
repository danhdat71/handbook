$('.change-background').change(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': _token
        },
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
                $('.progress-bar').css({
                    'width' : percentComplete + "%"
                }).text(percentComplete + "%");
              }
            }, false);

            return xhr;
        },
        url: baseUrl + '/slider',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (res) {
            let data = res.message;
            if(data !== undefined){
                $('.progress-bar').css({
                    'width' : "0"
                }).text("0%");
                for(var property in data) {
                    let validateMsg = data[property];
                    console.log(validateMsg);
                    $('.validate-msg').text("");
                    $('#form-slider-upload .' + property).text(validateMsg);
                }
                $('#upload-slider').prop('disabled', false);
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Lưu thành công ! Đang chuẩn bị refresh...',
                    showConfirmButton: false,
                    timer: 1500
                });
                let timeOut = setTimeout(function(){
                    $('#add').modal('hide');
                    location.reload();
                },3000);
            }
        }
    });
});