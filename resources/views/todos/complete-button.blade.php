@if($todo->completed)
<span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()"class="fas fa-check text-success fa-lg px-4" style="color:gainsboro; cursor:pointer"/>
<form style="display:none;" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}" method="post">
@method('put')
@csrf
</form>

@else

<span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="fas fa-check fa-lg px-4" style="color:gainsboro; cursor:pointer"/>
<form style="display:none;" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}" method="post">
@method('put')
@csrf
</form>
@endif