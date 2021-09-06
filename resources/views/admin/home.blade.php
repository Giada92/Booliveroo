@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @dd($newRestaurant->user->name) --}}
    {{-- @if (!$newRestaurant->isEmpty())
        @foreach ($newRestaurant as $item)
            <p>{{ $item->name }}</p>
        @endforeach
    @else
        <p>Nesun Ristorante associato</p>
    @endif --}}
    @if ($newRestaurant)
        <h2 class="title green">{{ $newRestaurant->name }}</h2>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('storage/' . $newRestaurant->cover) }}" alt="{{ $newRestaurant->name }}" style="width: 500px">
                </div>
                <div class="col">
                    <h5><strong>Propietario:</strong> {{ $newRestaurant->user->name }}</h5>
                    <h5><strong>Partita Iva:</strong> {{ $newRestaurant->piva }}</h5>
                    <br>
                    <h5><strong>Città:</strong> Roma</h5>
                    <h5><strong>Via:</strong> {{ $newRestaurant->address }}</h5>
                    <h5><strong>Partita Iva:</strong> {{ $newRestaurant->piva }}</h5>

                    <p class="category mt-3 mb-0"><strong>CATEGORIE:</strong></p>
                    @foreach ($newRestaurant->categories as $item)
                        <span class="btn-secondary btn-sm">{{ $item->name }}</span>   
                    @endforeach
                </div>
            </div>
        </div>
        
        <p class="p-3 text-justify">{{ $newRestaurant->description }}</p>
        {{-- @dd($newRestaurant->categories) --}}

        <div class="text-center wrapper_link">
            <a href="{{ route('admin.restaurants.edit', $newRestaurant->id) }}" class="btn bg">Modifica Locale</a>
            <a href="{{ route('admin.plates.index') }}" class="btn bg">Visualizza il Menù</a>
            <a href="#" class="btn bg">I tuoi Ordini</a>
            <form action="{{ route('admin.restaurants.destroy', $newRestaurant->id) }}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo Ristorante?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg">DELETE</button>
            </form>
        </div>
        
    @else
        <p>Non ci sono ristoranti</p>
        <a href="{{ route('admin.restaurants.create') }}" class="btn">Crea</a>
    @endif
</div>    

<style>
    .title {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .bg {
        background-image: linear-gradient(90deg, #ee3c4a, #fc8237);
        color: white;
    }

    form {
        display: inline-block;
    }

    .wrapper_link > a {
        margin: 0 10px;        
    }
</style>
    
@endsection