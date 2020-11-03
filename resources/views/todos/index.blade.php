@extends('todos.layout')
@section('content')
    <div class="d-flex justify-content-center">
      <h1 class="">ToDo List</h1>
      <a href="{{route('todo.create')}}"><span class="fas fa-plus-circle fa-2x text-success p-2"/></a>
    </div>    
    <hr class="w-25">
   <x-alert/>
      <ul class="" style="list-style-type: none;">
          @forelse($todos as $todo)
          <li class="d-flex justify-content-between my-3">
              <div>
                @include('todos.complete-button')
              </div>
              @if($todo->completed)
               <p><s>{{$todo->title}}</s></p> 
              @else
               <p><a href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a></p> 
              @endif
                <div>
                  <a href="{{route('todo.edit',$todo->id)}}">
                    <span class="fas fa-edit text-warning fa-lg px-4 cursor:pointer"/>
                  </a>
                  <span class="fas fa-trash text-danger fa-lg px-4 " style=" cursor:pointer;"
                    onclick="event.preventDefault();
                    if(confirm('Are you Sure ?'))
                    {
                    document.getElementById('form-delete-{{$todo->id}}')
                    .submit()
                    }
                    "/>
                  <form style="display:none;" id="{{'form-delete-'.$todo->id}}" action="{{route('todo.destroy',$todo->id)}}" method="post">
                  @method('delete')
                  @csrf
                  </form>
                </div>
            </li>
          @empty
                    <p class="py-4">No Tasks, click plus icon to create new.</p>
          @endforelse
      </ul>
@endsection