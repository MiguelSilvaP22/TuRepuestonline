@extends('ecommerce.layout') 
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css"> 

<style>
	.form-control {
    color: black ;
}
</style>
@stop 
@section('content')

<script>
	function validarForm(f){
		

		if($(".CompatibilidadRepuesto").length<=0)
		{
			alert("Error, debe ingresar un tipo de compatibilidad para el repuesto");
			return false;
		}
		else{
			alert("OK"); return true;
		}
	return false;	
	}
</script>
<div class="container mt-5 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Contacto</div>

				<div class="card-body">
					{!! Form::open(['action' => 'ContactoController@store','id'=>'formContacto']) !!}
					<div class='form-group'>
						{!! Form::label('', 'Nombre:') !!} {!! Form::text('nombre', null, ['class' => 'form-control','id'=>'nombre_repuesto','maxlength'=>'199', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Correo Eletrónico:') !!} {!! Form::email('correo_electronico', null, ['class' => 'form-control','id'=>'correo_electronico','maxlength'=>'199', 'required'])
						!!}
					</div
					<div class='form-group'>
						{!! Form::label('', 'Fono:') !!} {!! Form::number('fono', null, ['class' => 'form-control','id'=>'nombre_repuesto','maxlength'=>'199', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Mensaje:') !!} {!! Form::textArea('mensje', null, ['class' => 'form-control','id'=>'mensaje','maxlength'=>'999', 'required'])
						!!}
					</div>


					<div class='form-group'>
							{!! Form::submit("Enviar", ['class' => 'form-control btn btn-success text-white', 'id'=>'uploadButton']) !!}
					</div>
						{!! Form::close() !!}
					<div class='form-group'>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@stop 
@section('script-js')

@stop