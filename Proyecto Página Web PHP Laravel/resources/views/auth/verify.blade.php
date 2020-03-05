@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu cuenta de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha tenido que enviar un link de verifiación.') }}
                        </div>
                    @endif

                    {{ __('Revisa tu correo.') }}
                    {{ __('Si no has recibido el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aquí para reenviar correo') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
