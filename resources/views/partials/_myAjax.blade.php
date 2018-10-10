<script type="text/javascript">
$(document).ready(function(){
    //get modal
    $('#create-task').click(function(){
        $('#create').modal('show');
        $('.form-horizontal').show();
              
    });
    //create
$("#save-task").click(function() {

$.ajax({
        type: 'POST',
        url: '/todo/task',
        data: {
            '_token': '{{ csrf_token() }}',
            'body': $('input[name=body]').val()
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.body);
            } else {
                $('.error').remove();
                $('#tasks-list').append(
                    
                    "<li class='list-group-item my-list"+data.id+"' ><div class='checkbox'><input type='checkbox' name='' value='"+data.id+"' id='"+data.id+"'><label class='strikethrough'>"+ data.body +" </label><button type='submit' class='delete-modal btn btn-danger pull-right btn-xs' data-id="+data.id+" data-body="+data.body+" value="+data.id+"><span class='glyphicon glyphicon-trash'></span></button><button type='submit' class='edit-modal btn btn-info pull-right btn-xs' data-id="+data.id+" data-body="+data.body+" value="+data.id+"><span class='glyphicon glyphicon-leaf'></span></button</div></li>  "
                    );
            }
        },
    });
    $('#body').val('');
});

});

//edit
$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text('Edit Task');
    $('.form-horizontal').show();
    $('.id').text($(this).data('id'));
    $('#b').val($(this).data('body'));
    $('#update').modal('show');
});

$('.modal-footer').on('click', '.editBtn', function() {

        $.ajax({
            type: 'POST',
            url: '/todo/update/' + $('.id').text(),
            data:{
                '_token': $('input[name=_token]').val(),
                
                'body': $('#b').val()
            },
            success:function(data){
                $('.my-list' + $('.id').text()).replaceWith(" " + "<li class='list-group-item my-list"+data.id+"' ><div class='checkbox'><input type='checkbox' name='' value='"+data.id+"' id='"+data.id+"'><label class='strikethrough'>"+ data.body +" </label><button type='submit' class='delete-modal btn btn-danger pull-right btn-xs' data-id="+data.id+" data-body="+data.body+" value="+data.id+"><span class='glyphicon glyphicon-trash'></span></button><button type='submit' class='edit-modal btn btn-info pull-right btn-xs' data-id="+data.id+" data-body="+data.body+" value="+data.id+"><span class='glyphicon glyphicon-leaf'></span></button</div></li>  "
                    );
                $('#update').modal('hide');
            }
        });
    });

//delete
$(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete Task');
            $('.id').text($(this).data('id'));
            $('.deleteContent').show();
            $('.body').html($(this).data('body'));
            $('#deleteModal').modal('show');
        });

        $('.modal-footer').on('click', '.deleteBtn', function() {

            $.ajax({
                type: 'POST',
                url: '/todo/delete/' + $('.id').text(),
                
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    '_method':'DELETE',
                    '_token': $('input[name=_token]').val(),
                    'id':$('.id').text()
                    
                },
                success: function(data) {
                    //alert('Successfull');
                    $('.my-list' + $('.id').text()).remove();
                    $('#deleteModal').modal('hide');
                }
            });
        });

//checkbox to database
$(document).ready(function() {

    //$('.iscom').prop('checked', true);
    
    $(".iscom").change(function(){

        var id = $(this).data('id');
        //alert(id);
        $.ajax({
            type: 'POST',
            url: '/todo/iscomplete/'+ $(this).data('id'),
            headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
            data: {
                '_token': $('input[name=_token]').val(),
                'id':id
            },
            success: function(data){
                if (data.data.success) {
                    alert('completed');
                }
            }
        });
    });
});

    </script>