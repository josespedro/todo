@extends('todos.layout')
@section('content')
    <div class="d-flex justify-content-center py-2">
        <h1 class="bold"> Details of Task : {{$todo->title}}</h1>
        <a href="{{route('todo.index')}}"> <span class="fas fa-arrow-left fa-2x text-secondary py-2 px-4"/> </a>
    </div>
    <hr class="">
    <div>
        <h3><strong>Title :</strong></h3>
        <h4>{{$todo->title}}</h4>
    </div>
    <div>
        <h3><strong>Details :</strong></h3>
        <p>{{$todo->details}}</p>
    </div>
    @if($todo->steps->count()>0)
    <div>
        <h3>Steps for this todo :</h3>
        @foreach($todo->steps as $step)
            <p>{{$step->name}}</p>
        @endforeach
    </div>
    @endif
@endsection