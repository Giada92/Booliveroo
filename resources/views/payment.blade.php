<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            #amount {
                margin-left: 145px;
                border: none;
            }
            #amount:hover {
                cursor:auto;
            }
            #amount:focus {
                border: none;
                outline: none;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .width {
                width: auto;
                margin: 300px 500px
            }
        </style>
    </head>
    <body>
        <div class="content">
            <form method="post" id="payment-form" action="{{ url('/checkout') }}">
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
                <button class="button" type="submit"><span>Test Transaction</span></button>
            </form>
        </div>

        <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
        <script>

            var form = document.querySelector('#payment-form');
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