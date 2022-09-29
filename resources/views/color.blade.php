<form action="{{route('color.store')}}" method="post">
    @csrf
{{--    @method('PUT')$user->id--}}
    <input type="text" name="name"/>
    <button type="submit">Click Me</button>
</form>
