@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    <p>{{session()->get('success')}}</p>
</div>
@endif
