@extends('layouts.manage')

@section('dynamicJS')

  <script type="text/javascript"></script>

@endsection

@section('content')


    

  <div class="container">

    <h2 class="text-center">Things To Do</h2>
    <p class="text-center">Please kindly add all things you need to do,<br> To help keep your on the right path.<br><br></p>

    <header class="panel-heading">
                  <a href="#" id="create-task" class="btn  btn-success pull-right"> <span class="glyphicon glyphicon-pencil"></span> Add New </a>
    </header><br><br>

    <div id="checkbox-container">
    <ul class="list-group" id="tasks-list" >
      @foreach($checklist as $list)
      <li class="list-group-item" >
        <div class="checkbox">
        <input type="checkbox"  id="{{$list->id}}" name="perm[{{ $list->id }}]" value="{{ $list->id }}"> 
        <label class="strikethrough">{{$list->body}} </label> <a href="#" class="delete-task btn btn-danger pull-right btn-xs" data-id="{{$list->id}}" data-body="{{$list->body}}"><span class="glyphicon glyphicon-trash"></span> </a>
        </div>
      </li>
      @endforeach
    </ul>
    
    

    <button type="submit" class="btn btn-sm btn-info">Check All</button>
  </div>
    <!-- Pagination -->
          <ul class="pagination pull-right">
            <li class="page-item">
              <a class="page-link" href="{{  $checklist->nextPageUrl() }}">&larr; Older</a>
            </li>
            <li class="page-item ">
              <a class="page-link" href="{{ $checklist->previousPageUrl() }}">Newer &rarr;</a>
            </li>
          </ul>

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
            <input class="form-control input-lg"  placeholder="Enter your Task" id="body" name="body" required/><i class="text-muted">Enter and save multiple task. Close when you are done.</i>
            <p class="text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save-task" id="save-task"  class="btn btn-warning " ><span class="glyphicon glyphicon-plus"> Save-Task</span></button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        <button type="submit" name="delete-task" id="delete-task"   class="deleteBtn btn btn-danger " ><span class="glyphicon glyphicon-trash"> Delete-Task</span></button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
      </div>
    </div> 

  </div>
</div>{{-- end of modal --}}

@endsection