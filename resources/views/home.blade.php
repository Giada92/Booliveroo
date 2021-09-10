@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Hai eseguito l'accesso!") }}
                </div>

                {{-- <div class="my-4">
                    <button>
                        <a href="{{ route('admin.restaurants.home') }}" class="btn bg">Il Tuo Locale</a>
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
