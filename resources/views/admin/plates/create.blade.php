@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Aggiungi un nuovo piatto</h2>
    {{-- FORM --}}
    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="name">Nome del Piatto</label>
          <input type="text" class="form-control" id="name" placeholder="Inserisci il nome del ristorante" name="name">
        </div>
        @error('name')
              <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="description">Descrizione del Piatto</label>
            <textarea class="form-control" id="description" rows="6" placeholder="Inserisci una descrizione" name="description"></textarea>
        </div>
        @error('description')
              <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" class="form-control" id="price"  min="0.01" step="0.01" max="999"  placeholder="Inserisci il prezzo" name="price">
          </div>
          @error('price')
                <small class="text-danger">{{ $message }}</small>
          @enderror

        {{-- Vegetariano --}}
        <h6>Vegetariano</h6>
        <div class="form-check">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="veg" name="veg">
                <label class="form-check-label" for="veg">Veg</label>
            </div>
        </div>
        {{-- Vegetariano --}}

        {{-- Disponibile --}}
        <h5>Disponibilità</h5>
        <div class="form-check">
            <div class="form-check">
                <input type="checkbox" checked class="form-check-input" id="availability" name="availability">
                <label class="form-check-label" for="availability">Disponibile</label>
            </div>
        </div>
        {{-- Disponibile --}}
        
        {{-- File  --}}
        <div class="form-group">
            <label for="img">Inserisci l'immagine</label>
            <div class="mb-3">
              <img id="output" style="width: 150px">
            </div>
            <input type="file" class="form-control-file" id="img" name="img" value="img" onchange="loadFile(event)">
            @error('img')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          {{-- /File  --}}
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>

<script>
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      }
</script>
    
@endsection