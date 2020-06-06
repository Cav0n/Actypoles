<div class="form-group">
    @isset($label)
    <label for="{{$name}}">
        {{$label}}
    </label>
    @endisset

    <input
        id="{{$name}}"
        class="form-control {{$class ?? null}}"
        type="{{$type ?? 'text'}}"
        name="{{$name}}"
        value="{{old("$name", ($value ?? null))}}">
</div>
