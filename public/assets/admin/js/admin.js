
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


    function searchVideo() {
        $('#query').keydown(function (e){
        })
    }
});