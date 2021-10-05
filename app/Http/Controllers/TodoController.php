<?php

namespace App\Http\Controllers;

use App\Http\Requests\TOdoCreateRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use App\Models\Step;

class TodoController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        // passing data to view
        // return view ('todo.index')->with(['todos'=>$todos]); 
        $todos = auth()->user()->todos->sortBy('completed');
        return view ('todos.index',compact('todos'));
    }

    public function create()
    {
        return view ('todos.create');
    }

    
    public function store(TOdoCreateRequest $request){

        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
        }
        return redirect(route('todo.index'))->with('message',$todo->title.' created successfully !');
    }

    public function edit(Todo $todo)
    {
        return view ('todos.edit',compact('todo'));
    
    }

    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }

    public function update( TOdoCreateRequest $request,Todo $todo)
    {
        $todo->update([ 'title'=>$request->title]);
        if($request->stepName){
            foreach($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name'=>$value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name'=>$value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message',$todo->title.' Updated!!!');
    }

    public function complete(Todo $todo)
    {
        $todo -> update(['completed' => true]);
        return redirect()->back()->with('message','Task marked as Completed !');
    }

    public function incomplete(Todo $todo)
    {
        $todo -> update(['completed' => false]);
        return redirect()->back()->with('message','Task marked as inCompleted !');
    }

    public function destroy(Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted!');
    }

    
}
