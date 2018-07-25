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


<script>
    function validarForm(f){

        if($( "#selectTipoUsuario" ).val()==1){
            rutFormato = $.rut.formatear($("#run_personanatural").val());
            if($.rut.validar(rutFormato)){
            return true;
            }
            else{
                alert("Error: el rut ingresado no es valido")
                return false;
            }
        }

        if($( "#selectTipoUsuario" ).val()==2){
            rutFormato = $.rut.formatear($("#rut_empresa").val());
            if($.rut.validar(rutFormato)){
            return true;
            }
            else{
                alert("Error: el rut ingresado no es valido")
                return false;
            }
        }

        
    }
</script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de nuevo Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" onsubmit="return validarForm(this)">
                        @csrf



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <select class="form-control" id="selectTipoUsuario" onchange="cambioForm()" name="tipoUsuario" , required>
                                        <option value="" selected disabled>Seleccionar Tipo de Usuario</option>
                                        <option value="1">Persona Natural</option>
                                        <option value="2">Empresa</option>
                                </select>
                            </div>
                        </div>
                        <div id="PersonaNatural"></div>
                        @if ($errors->has('run_personanatural'))    
                        <div class="alert alert-danger" role="alert">
                            El rut ingresado, ya se encuentra registrado.
                        </div>
                        @endif
                        @if ($errors->has('rut_empresa'))
                        <div class="alert alert-danger" role="alert">
                            El rut ingresado, ya se encuentra registrado.
                        </div>
                        @endif

                        
                        @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            El correo ingresado, ya se encuentra registrado.
                        </div>
                        @endif

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
    $(function() {

        $( "#run_personanatural" ).keyup(function() {
            console.log("MEOW");
        });
  });
   

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

<script>!function(a){function b(a,b){a.closest(".rut-container").append(b)}a.fn.rut=function(c){var d=a.extend({error_html:'<span class="rut-error">Rut incorrecto</span>',formatear:!0,on:"blur",required:!0,placeholder:!0,fn_error:function(a){b(a,d.error_html)},fn_validado:function(a){}},c);return this.each(function(){var b=a(this);b.wrap('<div class="rut-container"></div>'),b.attr("pattern","[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}").attr("maxlength",12),d.required&&b.attr("required","required"),d.placeholder&&b.attr("placeholder","12.345.678-5"),d.formatear&&b.on("blur",function(){b.val(a.rut.formatear(b.val()))}),b.on(d.on,function(){a(".rut-error").remove(),a.rut.validar(b.val())&&""!=a.trim(b.val())?d.fn_validado():d.fn_error(b)})})}}(jQuery),jQuery.rut={validar:function(a){if(!/[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}/.test(a))return!1;var b=a.split("-"),c=b[1],a=b[0].split(".").join("");return"K"==c&&(c="k"),$.rut.dv(a)==c},dv:function(a){for(var b=0,c=1;a;a=Math.floor(a/10))c=(c+a%10*(9-b++%6))%11;return c?c-1:"k"},formatear:function(a){for(var b=this.quitar_formato(a),a=b.substring(0,b.length-1),c="";a.length>3;)c="."+a.substr(a.length-3)+c,a=a.substring(0,a.length-3);return""==$.trim(a)?"":a+c+"-"+b.charAt(b.length-1)},quitar_formato:function(a){return a=a.split("-").join("").split(".").join("")}};</script>

@endsection

