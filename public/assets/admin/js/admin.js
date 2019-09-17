
const notifier = {
    notify:function(message, type){
        toastr[type](message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
};
jQuery(function($) {

    function notify(message, type) {
        toastr[type](message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    }

    $(function () {

        function confirmDelete() {
            $('#modalConfirmDelete').remove();
            let html = '';
            <!--Section: Modals-->
            html += '<section>';
            /*<!--Modal: modalConfirmDelete-->*/
            html += '<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">';
            html += '<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">';
            /* <!--Content-->*/
            html += '<div class="modal-content text-center">';
            /*  <!--Header-->*/
            html += '<div class="modal-header d-flex justify-content-center">';
            html += '<p class="heading">Are you sure?</p>';
            html += '</div>';

            /*<!--Body-->*/
            html += '<div class="modal-body">';

            html += '<i class="fa fa-times fa-4x animated rotateIn"></i>';

            html += '</div>';

            /*<!--Footer-->*/
            html += '<div class="modal-footer flex-center">';
            html += '<a type="button" class="btn btn-danger submit-dialog" style="color: #fff0ff">Yes</a>';
            html += '<a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No</a>';
            html += '</div>';
            html += '</div>';
            /*<!--/.Content-->*/
            html += '</div>';
            html += '</div>';
            /*    <!--Modal: modalConfirmDelete-->*/
            html += '</section>';
            /*<!--Section: Modals-->*/

            $('body').append(html);

            $('#modalConfirmDelete').modal('show');
        }


        $(document).on('click',".delete", function(e) {
            const context = $(this);
            const id = $(this).attr('data-id');
            const url = $(this).data('url');
            confirmDelete();
            $('.submit-dialog').on('click', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: 'ids=' + id,
                    success: function (data) {
                        $('#modalConfirmDelete').modal('hide');
                        if (data['success']) {
                            $('table').find(context).parents("tr").remove();
                            context.parent("tr").slideUp("slow");
                            notify(data['success'], 'success');
                        } else if (data['error']) {
                            notify(data['error'],'error');
                        } else {
                            notify('Whoops Something went wrong!!','error');
                        }
                    },
                    error: function (data) {
                        notify('Oops something went wrong','error');
                        $('#modalConfirmDelete').modal('hide');
                    }
                });
                $('table tr').filter("[data-row-id='" + id + "']").remove();
            });
        });
    });


/*    $('#embed').mouseleave(function (e){
        let link = $(this).val();
        const routeLink = "/admin/embed/check-embed";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: routeLink,
            data: 'url=' + link,
            beforeSend: function(xhr){
                //alert();
            },
            success: function (data) {
                $('#videoModal').modal('show');
                $('.modal-body').html(data);
            },
            error: function (error) {
                //notify(error);
                $('#videoModal').modal('hide');
            },
            complete: function(){
                $('.okModal').on('click',function (e) {
                    $('#videoModal').modal('hide');
                });
            }
        });
    });*/

    $('#embed').mouseleave(function (e){
        const url = $("this").val();
        // image_url = getVideoThumbnail(url);
        let notice = $('.notify');
        let urlSrc;
        notice.show();
        if(url !== undefined || url !== ''){
            const videoObj = parseUrl(url);

            if(videoObj.type === 'youtube'){
                urlSrc = "https://www.youtube.com/embed/" + videoObj.id + "?rel=0&wmode=transparent&showinfo=0";
                console.log(urlSrc);
                $("#iframSrc").attr('src',urlSrc);
                $('#videoModal').modal('show');
            }else if(videoObj.type === 'vimeo'){
                urlSrc = "https://player.vimeo.com/video/" +  videoObj.id + "?rel=0&wmode=transparent&showinfo=0";
                $("#iframSrc").attr('src',urlSrc );
                $('#videoModal').modal('show');
            }else{
                notice.html('<div class="alert alert-warning alert-dismissible">No Match, Probably url doeanot exists</div>');
                notice.slideUp(8000);
            }
        }else {
            notice.html('<div class="alert alert-warning alert-dismissible">Url empty or not valid</div>');
            notice.slideUp(8000);
        }

        if(urlSrc !== null){
            $(this).val("");
            $(this).val(urlSrc);
        }
        $('.okModal').on('click',function (e) {
            $('#videoModal').modal('hide');
        });

    });

    function parseUrl(url){
        let type;
        const pattern = url.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

        if (RegExp.$3.indexOf('youtu') > -1) {
            type = 'youtube';
            return {
                type: type,
                id: RegExp.$6
            };
        } else if (RegExp.$3.indexOf('vimeo') > -1) {
            const v = url.match(/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/);
            type = 'vimeo';
            return {
                type: type,
                id: RegExp.$3
            };
        }
        return {
            type: type,
            id: RegExp.$6
        };
    }

});