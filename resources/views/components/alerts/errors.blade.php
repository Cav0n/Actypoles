@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
