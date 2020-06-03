@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        <strong>{{$error}}</strong>
    @endforeach
</div>
@endif
