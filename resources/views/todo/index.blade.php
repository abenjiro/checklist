@extends('layouts.manage')

@section('dynamicJS')

  <script type="text/javascript"></script>

@endsection

@section('content')


    

  <div class="container-fluid">
    <div class="row">
    <div  class="col-sm-10 col-sm-offset-1">

    <h2 class="text-center">Things To Do Today</h2>
    <p class="text-center text-muted">Please kindly add all things you need to do,<br> To help keep you on the right path.<br><br></p>

    <header class="panel-heading">
                  <a href="#" id="create-task" class="btn  btn-success pull-right"> <span class="fa fa-book"></span> Add New </a>
    </header><br><br>

    <div id="checkbox-container">
    <ul class="list-group " id="tasks-list" >
      
      <li class="list-group-item active" style="font-family: sans-serif; "><strong> Total Task List For Today is <i>{{$totalList}}</i> , completed task <i>{{$completedList}}</i> </strong> <span class="badge">{{$totalList}}</span>
      </li>
      @foreach($checklist as $list)

      <li class="list-group-item  my-list{{$list->id}}" >

        <div class="checkbox">

        <input type="checkbox"  

               id="{{$list->id}}" 

               data-id="{{$list->id}}"

               name="lists" 

               value="{{$list->id}}" 

               {{$list->iscompleted ? 'checked' : ''}} 

               class="iscom"
          />

        <label class="strikethrough">{{ substr($list->body, 0, 70) }} {{ strlen($list->body) > 70 ? "...": "" }} </label> 

        <button type="submit" class="delete-modal btn btn-danger pull-right btn-xs" data-id="{{$list->id}}" data-body="{{$list->body}}" value="{{$list->id}}"><span class="fa fa-trash-o"></span></button>

       <button type="submit" class="edit-modal btn btn-info pull-right btn-xs" data-id="{{$list->id}}" data-body="{{$list->body}}" value="{{$list->id}}"><span class="fa fa-magic "></span></button>

        </div>
      </li>
      @endforeach
      @foreach ($st as $item)
          <table>
            <tr>
              <th>file</th>
            </tr>
            <tr>
            <td>{{$item}}</td>
            <td><a href="{{route('todo.download', $item)}}" class="btn btn-success" >download asset</a> </td>
            </tr>
          </table>
      @endforeach
    </ul>
    
    

    {{-- <button type="submit" class="checkme btn btn-sm btn-info">Check All</button> --}}
  </div>
    <!-- Pagination -->
          <ul class="pagination pull-right">
            <li class="page-item">
              <a class="page-link" href="{{  $checklist->nextPageUrl() }}"><span class=" fa fa-arrow-left"> Old</span></a>
            </li>
            <li class="page-item ">
              <a class="page-link" href="{{ $checklist->previousPageUrl() }}">New <span class="fa fa-arrow-right"></span></a>
            </li>
          </ul>

  </div>
  </div>
</div>

<!--Create Modal -->
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Task</h4>
      </div>
      
      <div class="modal-body">
        <form class="form-horizontal" role="form">
        
            <div class="form-group">
            <label class="control-label col-sm-2">Task:</label>
            <div class="col-sm-10">
            <input class="form-control input-lg"  placeholder="Enter your Task" id="body" name="body" required/><br><i class="text-muted">Enter and save multiple task. Close when you are done.</i>
            <p class="text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save-task" id="save-task"  class="btn btn-warning " ><span class="fa fa-plus"> Save-Task</span></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"> Close</span></button>
      </div>
    </div> 

  </div>
</div>{{-- end of modal --}}

<!--Update Modal -->
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      
      <div class="modal-body">
        <form class="form-horizontal" role="form">
        
            <div class="form-group">
            <label class="control-label col-sm-2">Task:</label>
            <div class="col-sm-10">
            <input class="form-control input-lg" type="text" id="b" value="" name="body" required/><br>
            <p class="text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="update-task" id="update-task"  class="editBtn btn btn-warning " ><span class="fa fa-eraser"> Update-Task</span></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times"> Close</span></button>
      </div>
    </div> 

  </div>
</div>{{-- end of modal --}}


<!--Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <form class="form-horizontal" role="form">
       
      <div class="modal-body">
        <div class="deleteContent">
          <p>Are you sure you want to delete "<strong><i class="body"></i></strong>"?</p>
          <span class="hidden id"> </span>
        </div>
      </div>
    </form>
      <div class="modal-footer">
        <button type="hidden" name="_method" id="id"   class="deleteBtn btn btn-danger " value="delete"><span class="fa fa-trash-o"> Delete-Task</span></button>
        {{-- <button class="deleteBtn btn btn-danger pull-right btn-xs" data-token="{{ csrf_token()}}" data-id="{{$list->id}}"><span class="glyphicon glyphicon-trash"></span></button> --}}
        <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times"> Cancel</span></button>
      </div>
    </div> 

  </div>
</div>{{-- end of modal --}}

@endsection