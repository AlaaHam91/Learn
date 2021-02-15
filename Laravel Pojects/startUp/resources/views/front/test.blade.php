<html>
    <p>Hello</p>
    {{-- <p>The passed parameter to the vew is :{{$id}}</p> --}}
    <p>The passed parameter to the vew is :{{$data->id}}</p>
    @if ($data->name=='Ali')
        <p>The name inside if is : {{$data->name}}</p>
    @endif
@foreach ($data as $item)
    <p>{{$item}}</p>
@endforeach
</html>