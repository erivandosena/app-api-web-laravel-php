
<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="name">{{ __('Nome') }}</label>
        <input id="name" type="text" size="50" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Nome de usuário') }}" name="name" value="@if (isset($dados['usuario']->name)) {{ $dados['usuario']->name }} @endif">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="email">{{ __('E-Mail') }}</label>
        <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Endereço de e-mail') }}" name="email" value="@if (isset($dados['usuario']->email)) {{ $dados['usuario']->email }} @endif">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="cod_esco">{{ __('Escola') }}</label>
        <select id="cod_esco" class="form-control @error('name') is-invalid @enderror" name="cod_esco" value="@if (isset($dados['usuario']->cod_esco)) {{ $dados['usuario']->cod_esco }} @endif">
            <option value="">Selecione a escola</option>
            @foreach ($dados['escola'] as $escola)
                @if(!$dados['usuario'])
                    <option value="{{ $escola->cod_esco }}"> {{ $escola->nome_fantasia }} </option>
                @else
                    <option value="{{ $escola->cod_esco }}" @if ($dados['usuario']->cod_esco == $escola->cod_esco) selected="selected" @endif> {{ $escola->nome_fantasia }} </option>
                @endif
            @endforeach
        </select>
        @error('cod_esco')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="inputGroupFileAvatar">{{ __('Avatar') }}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddonAvatar">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" id="inputGroupFileAvatar" style="cursor:pointer" aria-describedby="inputGroupFileAddonAvatar" class="form-control custom-file-input" @error('avatar') is-invalid @enderror name="avatar" value="@if (isset($dados['usuario']->avatar)) {{ $dados['usuario']->avatar }} @endif" accept="image/*" onchange="document.getElementById('img_avatar').src = window.URL.createObjectURL(this.files[0])">
                <label class="custom-file-label" for="inputGroupFileAvatar" data-browse="Carregar Imagem">Escolher arquivo</label>
                @error('inputGroupFileAvatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if($dados['usuario'])
            <img id="img_avatar" src="data:image/png;base64, @if (isset($dados['usuario']->avatar)) {{ $dados['usuario']->avatar }} @endif" style="border: 1px solid #ddd; border-radius: 5px; height: 150px; float: left; margin: 10px 0px 0px 0px;">
        @else
            <img id="img_avatar" src="/logo_web.png" style="border: 1px solid #ddd; border-radius: 5px; height: 150px; float: left; margin: 10px 0px 0px 0px;">
        @endif
    </div>
</div>

<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="password">{{ __('Senha') }}</label>
        <input id="password" type="password" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Senha com mínimo de 6 caracteres') }}" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col-sm-10 mb-3">
        <label for="password-confirm">{{ __('Confirma Senha') }}</label>
        <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Repita a senha com 6 caracteres') }}" name="password_confirmation">
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-sm-1 offset-md-0">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">@if (isset($dados['usuario']->name)) Atualizar @else Salvar @endif</button>
    </div>
</div>
