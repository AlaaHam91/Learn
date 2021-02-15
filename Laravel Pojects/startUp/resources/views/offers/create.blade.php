<html>
    <p>Add offer Page</p>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
                            <span class="sr-only">(current)</span></a>
                    </li>
                @endforeach
    
    
            </ul>
      
        </div>
    </nav>
    @if (Session::has('success'))
    <div class="alert alert success">
{{Session::get('success')}}
    </div>
    @endif
  
    <form method="POST" action="{{route('offers.store')}}">
        @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="latinName" class="col-md-4 col-form-label text-md-right">{{ __('latinName') }}</label>

        <div class="col-md-6">
            <input id="latinName" type="text" class="form-control @error('latinName') is-invalid @enderror" name="latinName" value="{{ old('latinName') }}"  autocomplete="latinName">

            @error('latinName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

        <div class="col-md-6">
            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <input type="submit" >
</form>
</html>