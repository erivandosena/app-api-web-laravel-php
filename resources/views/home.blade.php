@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Área Restrita') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está Logado(a)!') }}

                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <img src="/logo.jpg" alt="GEES" style="height: 450px; width: 450px; border-image: 0px; margin-top: 10px; margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
