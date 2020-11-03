<div>
    <div class="display-flex justify-content-center ">
        <label for="title" class="text-left">Add Steps for Task</label>
        <span wire:click="increment" class="fas fa-plus text-dark fa-lg px-4 " style="cursor:pointer"/>
    </div>
    @foreach($steps as $step)
    <div class="d-flex" wire:key="{{$step}}">
        <input type="text" name="step[]" class="form-control"  placeholder="{{'Describe Step '.($step +1)}}" class="py-2 px-2">
        <span class="fas fa-times text-danger p-2 " style="cursor:pointer" wire:click="remove({{$step}})"/>
    </div>
    @endforeach
 </div>
