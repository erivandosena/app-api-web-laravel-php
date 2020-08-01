@extends('layouts.layout_principal')

@guest
    <br />
@else
    @section('content')
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <!-- inicio restante do conteúdo -->
                    <div class="card" style="margin: 50px;">
                        <div class="card-header">{{ __('Área Restrita') }}</div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <h5 class="card-title"></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><strong></strong></h6>
                                <p class="card-text">
                                    <strong>
                                        <div class="alert alert-info" role="alert">
                                            {{ __('Você está Logado(a)!') }}
                                        </div>
                                    </strong>
                                </p>
                                <img src="/logo_web.png" alt="GEES" style="height: 512px; width: 512px; border-image: 0px; margin-top: 10px; margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>
                    <!-- fim restante do conteúdo -->
                </div>
            </div>
        </div>
    @endsection
@endguest
