@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @dd($plate->types) --}}
        <h5>Nome Del Piatto: {{ $plate->name }}</h5>
        <img src="{{ $plate->img }}" alt="{{ $plate->name }}">
        <h6>Prezzo: {{ $plate->price }}€</h6>
        <p>
            Vegeariano: 
            @if ($plate->veg)
                Sì
            @else
                No
            @endif
        </p>
            
        <p>
            Stato: 
            @if ($plate->availability)
                Disponibile
            @else
                Non Disponibile
            @endif
        </p>
        <p>Descrizione: {{ $plate->description }}</p>
        @foreach ($plate->types as $type)
            <p>Tipo: {{ $type->name}}</p>
        @endforeach
        <a href="{{ route('admin.plates.edit', $plate->id) }}" class="btn btn-info">Modifica</a>
    </div>
@endsection