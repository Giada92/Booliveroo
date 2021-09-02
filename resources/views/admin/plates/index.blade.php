@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Il tuo Menù</h1>
        <a href="{{ route('admin.plates.create') }}" class="btn btn-info">Crea Piatto</a>
        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">Torna al Ristorante</a>
    </div>

    <div class="row my-5">
        @foreach ($plates as $plate)
            <div class="cards text-center m-5">
                <h5>{{ $plate->name }}</h5>
                <img src="{{ asset('storage/' . $plate->img) }}" alt="{{ $plate->name }}" style="width: 100px">
                <h6>{{ $plate->price }}</h6>
                <a href="{{ route('admin.plates.show', $plate->id) }}" class="btn btn-info">Visualizza</a>
            </div>
        @endforeach
    </div>
</div>    
    
@endsection