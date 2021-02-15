<html>
    @foreach ($offers as $offer)
    <p>{{$offer->name}}</p>

        <p>{{$offer->price}}</p>
    @endforeach
</html>