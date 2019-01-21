// $(document).ready(function() {
//     $(".timetabel").on('change', function(e) {
//         $(".all_response").hide();
//         $(".loader").show();
       
//         var category_id = $("select[name='category_id']").val();
//         var user_id = $("select[name='user_id']").val();
//         var start_date = $("input[name='frm_date']").val();
//         var end_date= $("input[name='to_date']").val();
//         //alert(category_id+" "+user_id+" "+start_date+" "+end_date+" "+ServerRoot);
//         e.preventDefault();
//         $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//            }
//        });
//          $.ajax({ 
//                 url: ServerRoot+'/result',
//                 type:'POST',
//                 data: {
//                     category_id: category_id,
//                     user_id: user_id,
//                     start_date: start_date,
//                     end_date: end_date
//                 },
//                 success: function(data) {
//                     $('.result_response').html(data);
//                 }
//          });
//          alert(url);
//         // e.preventDefault();
//         // var form_action = $("#create-item").find("form").attr("action");
//         // var title = $("#create-item").find("input[name='title']").val();
//         // var details = $("#create-item").find("textarea[name='details']").val();
//         // $.ajax({
//         //     dataType: 'json',
//         //     type:'POST',
//         //     url: form_action,
//         //     data:{title:title, details:details}
//         // }).done(function(data){
//         //     getPageData();
//         //     $(".modal").modal('hide');
//         //     toastr.success('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
//         // });
//     });
// });


    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".timetabel").on('change', function(e) {
        $(".all_response").hide();
        $(".loader").show();
       
        var category_id = $("select[name='category_id']").val();
        var user_id = $("select[name='user_id']").val();
        var start_date = $("input[name='frm_date']").val();
        var end_date= $("input[name='to_date']").val();
        //alert(category_id+" "+user_id+" "+start_date+" "+end_date+" "+ServerRoot);
        e.preventDefault();
        $.ajax({
        type:'POST',
        url: ServerRoot+'/ajaxRequest',
        data:{ category_id: category_id, user_id: user_id, start_date: start_date, end_date: end_date},
            success:function(data){
            $(".loader").hide();
            $('.result_response').html(data);
        }
        });
        });

        function contactform(){
            $('#contactForm').validate({
                submitHandler: function(form) {
            
                    var $form = $(form),
                        $messageSuccess = $('#contactSuccess'),
                        $messageError = $('#contactError'),
                        $submitButton = $(this.submitButton),
                        $errorMessage = $('#mailErrorMessage'),
                        submitButtonText = $submitButton.val();
        
                    $submitButton.val( $submitButton.data('loading-text') ? $submitButton.data('loading-text') : 'Loading...' ).attr('disabled', true);
        
                    $.ajax({
                        type: 'POST',
                        url: ServerRoot+'/send',
                        data: {
                            name: $form.find('#name').val(),
                            email: $form.find('#email').val(),
                            _token: $form.find('#_token').val(),
                            message: $form.find('#message').val()
                        }
                    }).always(function(data, textStatus, jqXHR) {
        
                        $errorMessage.empty().hide();
        
                        if (data.response == 'success') {
        
                            $messageSuccess.removeClass('hide-box');
                            $messageError.addClass('hide-box');
        
                            $form.find('.form-control').val('').blur().parent().removeClass('has-success').removeClass('has-danger').find('label.error').remove();
        
                            $form.find('.form-control').removeClass('error');
        
                            $submitButton.val( submitButtonText ).attr('disabled', false);
                            
                            return;
        
                        } else {
                            $errorMessage.html(data.errorMessage).show();
                        }
        
                        $messageError.removeClass('hide-box');
                        $messageSuccess.addClass('hide-box');
        
                        $form.find('.has-success').removeClass('has-success');
                            
                        $submitButton.val( submitButtonText ).attr('disabled', false);
        
                    });
                }
            });
        

        }
