<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>To-Do</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-lg-2">

        @include('partials._nav')

                </div>

        <div class="col-sm-9 col-lg-10">
            <div id="content">
            @yield('content')
            </div>
        </div>

            </div> {{-- and of row --}}
        </div> {{-- end of container --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>

    @yield('dynamicJS')

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



    </script>
</body>
</html>
