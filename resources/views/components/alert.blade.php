<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>Success !</strong> <p>{{session('message')}}</p>
    {{session('message')}}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        <strong>Failed !!!</strong> <p>{{session('error')}}</p>
    </div>
    @endif

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('details')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
