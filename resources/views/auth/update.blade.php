@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                {!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['UsuarioController@update',$usuario->id_usuario],'id'=>'formCompetencia']) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        @if($usuario->id_perfil==1)
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('nombres', $usuario->personanatural->last()->nombres_personanatural, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                                <div class="col-md-6">
                                        {!! Form::text('Apellidos', $usuario->personanatural->last()->apellidos_personanatural, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('RUN') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('RUN', $usuario->personanatural->last()->run_personanatural, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Fono') }}</label>
                            <div class="col-md-6">
                                    {!! Form::text('RUN', $usuario->personanatural->last()->fono_personanatural, ['class' => 'form-control']) !!}
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

@section('scripts')

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

