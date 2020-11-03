<div>
    <div class="display-flex justify-content-center ">
        <label for="title" class="text-left">Add Steps for Task</label>
        <span wire:click="increment" class="fas fa-plus text-dark fa-lg px-4 " style="cursor:pointer"/>
    </div>
    @foreach($steps as $step)
    <div class="d-flex" wire:key="{{$loop->index}}">
        <input type="text" name="stepName[]" class="form-control" value="{{isset($step['name']) ? $step['name'] : '' }}"  placeholder="{{'Describe Step '.($loop->index +1)}}" class="py-2 px-2">
        <input type="hidden" name="stepId[]" value="{{isset($step['id']) ? $step['id'] : ' '}}">
        <span class="fas fa-times text-danger p-2 " style="cursor:pointer" wire:click="remove({{$loop->index}})"/>
    </div>
    @endforeach
</div>
