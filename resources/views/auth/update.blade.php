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
        rutFormato = $.rut.formatear($("#run").val());
        if($.rut.validar(rutFormato)){
            return true;
        }
        else if($.rut.validar(rutFormatoE) ){
            return true;
        }
        else{
            alert("Error: el rut ingresado no es valido")
            return false;
        }
    }
</script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuario de nuevo Usuario') }}</div>

                <div class="card-body">
                {!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['UsuarioController@update',$usuario->id_usuario],'id'=>'formCompetencia', 'onsubmit'=>"return validarForm(this)"]) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
                            <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        @if($usuario->id_perfil==1)
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('nombres', $usuario->personanatural->last()->nombres_personanatural, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                                <div class="col-md-6">
                                        {!! Form::text('Apellidos', $usuario->personanatural->last()->apellidos_personanatural, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('RUN') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('RUN', $usuario->personanatural->last()->run_personanatural, ['class' => 'form-control', 'required', 'id'=>'run']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Fono') }}</label>
                            <div class="col-md-6">
                                    {!! Form::number('fono', $usuario->personanatural->last()->fono_personanatural, ['class' => 'form-control',  'required', 'min'=>'1000000', 'max'=>'1000000000']) !!}
                            </div>
                        </div>
                        @endif
                        @if($usuario->id_perfil==2)
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('nombres', $usuario->empresa->last()->nombre_empresa, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('direccion', $usuario->empresa->last()->direccion_empresa, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('rut', $usuario->empresa->last()->rut_empresa, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('fono', $usuario->empresa->last()->fono_empresa, ['class' => 'form-control', 'min'=>'1000000', 'max'=>'100000000']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Sitio Web') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('web', $usuario->empresa->last()->web_empresa, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        @endif


                    
                        <div class='form-group'>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                            {!! Form::submit("Editar Competencia", ['class' => 'form-control btn btn-primary ']) !!}
                                    
                                </div>
                            </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-js')

<script>!function(a){function b(a,b){a.closest(".rut-container").append(b)}a.fn.rut=function(c){var d=a.extend({error_html:'<span class="rut-error">Rut incorrecto</span>',formatear:!0,on:"blur",required:!0,placeholder:!0,fn_error:function(a){b(a,d.error_html)},fn_validado:function(a){}},c);return this.each(function(){var b=a(this);b.wrap('<div class="rut-container"></div>'),b.attr("pattern","[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}").attr("maxlength",12),d.required&&b.attr("required","required"),d.placeholder&&b.attr("placeholder","12.345.678-5"),d.formatear&&b.on("blur",function(){b.val(a.rut.formatear(b.val()))}),b.on(d.on,function(){a(".rut-error").remove(),a.rut.validar(b.val())&&""!=a.trim(b.val())?d.fn_validado():d.fn_error(b)})})}}(jQuery),jQuery.rut={validar:function(a){if(!/[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}/.test(a))return!1;var b=a.split("-"),c=b[1],a=b[0].split(".").join("");return"K"==c&&(c="k"),$.rut.dv(a)==c},dv:function(a){for(var b=0,c=1;a;a=Math.floor(a/10))c=(c+a%10*(9-b++%6))%11;return c?c-1:"k"},formatear:function(a){for(var b=this.quitar_formato(a),a=b.substring(0,b.length-1),c="";a.length>3;)c="."+a.substr(a.length-3)+c,a=a.substring(0,a.length-3);return""==$.trim(a)?"":a+c+"-"+b.charAt(b.length-1)},quitar_formato:function(a){return a=a.split("-").join("").split(".").join("")}};</script>

@endsection

