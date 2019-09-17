jQuery(function($) {

    $(document).on('change', '#image', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let file_data = $(this).prop("files")[0];
        let formData = new FormData();
        formData.append('file', file_data);
        const url = $(this).attr('data-url');
        $.ajax({
            cache: false,
            type: "POST",
            url: url,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            data: formData,
            async: true,
            dataType: "json",
            beforeSend: function (xhr) {
                //panel_body.find('.inform').html('<img src="/local/images/ajax-loader.gif" class="ajax-loader">');
                $.fancybox.open($('#animatedModal'), {
                    touch: false
                });
            },
            success: function (data, status) {
                //notify(data['success'], 'success');
                $(".old-img").hide();
                $("input[name=avatar]").val(data['filename']);
                $(".showImg").html('<img src="' + data['file'] + '" class="img-thumbnail rounded-circle">');
                //panel_body.find('.inform').html('<img src=/storage/'+data['path']+' class="image-responsive image-thumbnail" width="100%">');
                $('#animatedModal').html('<img src="' + data['file'] + '" class="img-thumbnail rounded-circle">');

                setTimeout(function () {
                    $.fancybox.close($('#animatedModal'));
                }, 1000)
            },
            error: function (data, status) {
                //panel_body.find('.inform').html('<p>'+ data['msg']+'</p>');
            },
            complete: function () {

            }
        });
    });


    const tutorEnum = ['#privatetutorbutton', '#tutorbutton'];
    $(tutorEnum[1]).hide();
    textSequence(0);
    function textSequence(i) {
        console.log(i);
        if (tutorEnum.length > i) {
            setTimeout(function() {
                $(tutorEnum[1]).show();
                $(tutorEnum[0]).hide();
                textSequence(++i);
            }, 4000); // 1 second (in milliseconds)
        }else if(tutorEnum.length === i) { // Loop
            //$(tutorEnum[i]).removeAttr('display');
            $(tutorEnum[1]).hide();
            $(tutorEnum[0]).show();
            textSequence(0);
        }

    }
});


