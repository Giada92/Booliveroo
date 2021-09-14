<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form action="{{ route('orders.store') }}"  method="POST" id="form1" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="name">Inserisci il tuo Nome</label>
                  <input type="text" class="form-control" id="name" placeholder="Inserisci il tuo nome" name="name">
                </div>
                @error('name')
                      <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="lastname">Inserisci il tuo Cognome</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Inserisci il tuo cognome" name="lastname">
                  </div>
                @error('lastname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="address">Inserisci il tuo indirizzo di consegna</label>
                    <input type="text" class="form-control" id="address" placeholder="Inserisci il tuo indirizzo di consegna" name="address">
                  </div>
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label for="phone">Inserisci il tuo numero di telefono</label>
                    <input type="text" class="form-control" id="phone" placeholder="Inserisci il tuo numero di telefono" name="phone">
                  </div>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label for="email">Inserisci la tua mail</label>
                    <input type="email" class="form-control" id="email" placeholder="Inserisci la tua mail" name="email">
                  </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label for="restaurant_id"></label>
                    <input type="hidden" class="form-control" id="restaurant_id" placeholder="Inserisci la tua mail" name="restaurant_id" value="">
                </div>

                <div class="form-group">
                    <label for="price"></label>
                    <input type="text" class="form-control" id="price" name="price" value="">
                </div>
                <button type="submit">Salva</button>
            </form>
        </div>

        <script>
            var restaurantId = JSON.parse(localStorage.getItem('restaurantID'));
            var price = JSON.parse(localStorage.getItem('totalPrice'));

            window.addEventListener('DOMContentLoaded', (event) => {
                document.querySelector('#restaurant_id').value = restaurantId;
                document.querySelector('#price').value = price;
            });

            function datiCliente(){
                //console.log(JSON.parse(localStorage.getItem('restaurantID')));
                let restaurantID = JSON.stringify(this.restaurantID);
                localStorage.setItem('restaurantID', restaurantID);
            }


        </script>
    </body>
</html>