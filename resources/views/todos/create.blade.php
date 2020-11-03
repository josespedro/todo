@extends('todos.layout')
@section('content')
    <div class="d-flex justify-content-center py-2">
        <h1 class="bold">What is your next To-Do</h1>
        <a href="{{route('todo.index')}}"> <span class="fas fa-arrow-left fa-2x text-secondary py-2 px-4"/></a>
    </div>
    <hr class="w-50">
    <x-alert/>
    <form action="{{route('todo.store')}}" method="post">
        <div class="py-1 form-group">
            <label for="title" class="text-left">Title :</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Title" class="py-2 px-2">
        </div>
        <div class="py-1 form-group">
            <label for="title" class="text-left">Details :</label>
            <textarea name="details" class="form-control" placeholder="Details"  value="{{old('title')}}"></textarea>
        </div>
        <div class="py-1 form-group">
            <livewire:step />
        </div>
        
        <div class="py-1">
            <button type="submit" class="btn btn-primary py-2">Create</button>
        </div>
        @csrf
    </form>

@endsection