@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтверждение e-mail адреса') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка для подтверждения была отправлена на Ваш e-mail') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пройдите по верификационной ссылке, отправленной на Ваш e-mail') }}
                    {{ __('Если вы не получили ссылку для подтверждения') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('кликните здесь для повторной отправки') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
