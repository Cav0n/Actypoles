<div class="form-group">
    @isset($label)
    <label for="{{$name}}">
        {{$label}}
    </label>
    @endisset

    <textarea
        id="{{$name}}"
        class="form-control {{$class ?? null}}"
        name="{{$name}}"
        cols="{{$cols ?? 4}}"
        >{{old("$name", ($value ?? null))}}</textarea>
</div>
