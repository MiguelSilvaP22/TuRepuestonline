@extends('ecommerce.layout')
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/product_responsive.css">

<style>
	.form-control {
    color: black ;
}
</style>
@stop
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de nuevo Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="selectTipoUsuario" onchange="cambioForm()" name="tipoUsuario">
                                        <option value="" selected disabled>Seleccionar Tipo de Usuario</option>
                                        <option value="1">Persona Natural</option>
                                        <option value="2">Empresa</option>
                                </select>
                            </div>
                        </div>
                        <div id="PersonaNatural"></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-js')

<script>
    function cambioForm(){
     if($("#selectTipoUsuario").val()==1){
        $.ajax({
            url: "/personanatural/",
            type: "GET",
            success: function (datos) {
                $(PersonaNatural).html(datos)
                }
            });
    }

    if($("#selectTipoUsuario").val()==2){
        $.ajax({
            url: "/FormularioEmpresa/",
            type: "GET",
            success: function (datos) {
                $(PersonaNatural).html(datos)
                }
            });
    }

}


       /* var selectMarca = this;
        $.ajax({
            url: "/selectModelo/"+this.value,
            type: "GET",
            success: function (datos) {
                $(selectMarca).parent().append(datos)
                }
            });*/
    
</script>
@endsection

