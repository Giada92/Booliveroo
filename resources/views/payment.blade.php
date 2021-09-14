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
        <div class="content">
            <form onsubmit="return false" action="{{ url('/checkout') }}"  method="POST" id="form2">
                @csrf
                <section>
                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" value="" readonly>
                        </div>
                    </label>
                    <div class="bt-drop-in-wrapper width">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                
            </form>

            <button class="button" type="submit"><span>Test Transaction</span></button>
        </div>

        <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
        <script>

            var form = document.querySelector('#form2');
            var client_token = "{{ $token }}";
            
            window.addEventListener('DOMContentLoaded', (event) => {
                var totale = JSON.parse(localStorage.getItem('totalPrice'));
                document.querySelector('#amount').value = totale.toFixed(2);
            });
            

            braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
                });
            });
            });
        </script>
    </body>
</html>