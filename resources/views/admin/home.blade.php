@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @dd($newRestaurant) --}}
    {{-- @if (!$newRestaurant->isEmpty())
        @foreach ($newRestaurant as $item)
            <p>{{ $item->name }}</p>
        @endforeach
    @else
        <p>Nesun Ristorante associato</p>
    @endif --}}
    @if ($newRestaurant)
        <h2>{{ $newRestaurant->name }}</h2>
        <img src="{{ asset('storage/' . $newRestaurant->cover) }}" alt="{{ $newRestaurant->name }}" style="width: 500px">
        <p>{{ $newRestaurant->description }}</p>
        {{-- @dd($newRestaurant->categories) --}}
        <ul>
            @foreach ($newRestaurant->categories as $item)
                <li class="badge badge-pill badge-secondary">{{ $item->name }}</li>   
            @endforeach
        </ul>

        <div class="my-3">
            <a href="{{ route('admin.restaurants.edit', $newRestaurant->id) }}" class="btn btn-info">Modifica</a>
        </div>
        <a href="{{ route('admin.plates.index') }}" class="btn btn-info">Visualizza il tuo Menù</a>
        <form action="{{ route('admin.restaurants.destroy', $newRestaurant->id) }}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo Ristorante?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    @else
        <p>Non ci sono ristoranti</p>
        <a href="{{ route('admin.restaurants.create') }}" class="btn btn-info">Crea</a>
    @endif
    
    
    
   
</div>    
    
@endsection