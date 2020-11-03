@extends('todos.layout')
@section('content')
    <div class="d-flex justify-content-center py-2">
        <h1 class="bold">Change details of Task : {{$todo->title}}</h1>
        <a href="{{route('todo.index')}}"> <span class="fas fa-arrow-left fa-2x text-secondary py-2 px-4"/></a>
    </div>
    <hr class="">
    <x-alert/>
    <form action="{{route('todo.update',$todo->id)}}" method="post">
        @method('patch')
        <div class="py-1 form-group">
            <label for="title" class="text-left">Title :</label>
            <input type="text" name="title" class="form-control" value="{{$todo->title}}" class="py-2 px-2">
        </div>
        <div class="py-1 form-group">
            <label for="title" class="text-left">Details :</label>
            <textarea name="details" class="form-control" >{{$todo->details}}</textarea>
        </div>
        <div class="py-1 form-group">
            <!-- <livewire:edit-step :steps = "$todo->steps" /> -->
            @livewire('edit-step', ['steps' => $todo->steps])
        </div>
        <div class="py-1">
            <button type="submit" class="btn btn-primary py-2">Update</button>
        </div>
        @csrf
    </form>
@endsection