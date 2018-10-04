@extends('layouts.manage')

@section('dynamicJS')

  <script type="text/javascript"></script>

@endsection

@section('content')


    

  <div class="container">

    <h2 class="text-center">All Things Needed To Do This Month</h2>
    <p class="text-center">List of all task in the month of ...<br><br></p>

    

    <div id="checkbox-container">
    <ul class="list-group" id="tasks-list" >
      @foreach($checklist as $list)
      
      <li class="list-group-item my-list{{$list->id}}" >

        <div class="checkbox">

        <input type="checkbox"  id="{{$list->id}}" name="perm[{{ $list->id }}]" value="{{ $list->id }}"> 
        <label class="strikethrough">{{$list->body}} </label> 

        

        <button type="submit" class="delete-modal btn btn-danger pull-right btn-xs" data-id="{{$list->id}}" data-body="{{$list->body}}" value="{{$list->id}}"><span class="glyphicon glyphicon-trash"></span></button>
       
        </div>
      </li>
      @endforeach
    </ul>
    
    

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
        <button type="hidden" name="_method" id="id"   class="deleteBtn btn btn-danger " value="delete"><span class="glyphicon glyphicon-trash"> Delete-Task</span></button>
        {{-- <button class="deleteBtn btn btn-danger pull-right btn-xs" data-token="{{ csrf_token()}}" data-id="{{$list->id}}"><span class="glyphicon glyphicon-trash"></span></button> --}}
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
      </div>
    </div> 

  </div>
</div>{{-- end of modal --}}

@endsection