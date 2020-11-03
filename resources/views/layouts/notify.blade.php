@if(session()->has('message'))
<div class="alert alert-success">
    <strong>Success !</strong> <p>{{session('message')}}</p>
{{session()->forget('message')}}
</div>
@elseif(session()->has('error'))
<div class="alert alert-danger">
    <strong>Failed !!!</strong> <p>{{session('error')}}</p>
</div>
@endif