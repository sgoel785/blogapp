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