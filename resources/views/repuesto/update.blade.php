@extends('ecommerce.layout') 
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css">

<style>
	.form-control {
		color: black;
	}
</style>

@stop 
@section('content')

<div class="container mt-5 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Crear Repuesto</div>

				<div class="card-body">
						{!! Form::model($repuesto, ['method' => 'PATCH', 'action' => ['RepuestoController@update',$repuesto->id_repuesto],'id'=>'formRepuesto']) !!}
					<div class='form-group'>
						{!! Form::label('', 'Nombre:') !!} {!! Form::text('nombre_repuesto', $repuesto->nombre_repuesto, ['class' => 'form-control','id'=>'nombre_repuesto','maxlength'=>'199'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Categoría Repuesto:') !!} {!! Form::select('id_categoriarepuesto', $categoriasrepuestos,$repuesto->id_categoriarepuesto
						,['class'=> 'form-control','placeholder'=>'Seleccione una area','id'=>'id_categoriarepuesto']) !!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Precio:') !!} {!! Form::number('precio_repuesto', $repuesto->precio_repuesto, ['class' => 'form-control','id'=>'precio_repuesto','maxlength'=>'199'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Stock:') !!} {!! Form::number('stock_repuesto', $repuesto->stock_repuesto, ['class' => 'form-control',
						'min'=> '0','id'=>'stock','maxlength'=>'199']) !!}
					</div>
					<div class='form-group'>

						{!! Form::label('', 'Descripción:') !!} {!! Form::textArea('descripcion_repuesto', $repuesto->descripcion_repuesto, ['class'
						=> 'form-control','id'=>'descripcion_repuesto','maxlength'=>'999']) !!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Imágenes:') !!}
					</div>
					@foreach($repuesto->imagenrepuesto as $imagen)
					<div class='form-group'>
						<img src="/ecommerce/images/productos/{{ $imagen->ruta_imagenrepuesto }}" alt="..." class="img-thumbnail rounded mx-auto d-block">
					</div>
					@endforeach



					<div class='form-group' id="compatibilidad23">
						@php $countCiclos=0 @endphp
						@foreach($repuesto->compatibilidad as $modelo)
						@php $countCiclos=$countCiclos+1 @endphp

						<div class="card mt-3" id="tarjetaCompatibilidad{{ $countCiclos }}">
							<div class="card-header"> Compatibilidad de Repuesto</div>
							<div class="card-body">
								<div id="{{ $countCiclos }}">
									<div class="form-group">
										<label for="">Marca:</label>
										{!! Form::select('id_marca[]', $marcas,$modelo->marca->id_marca ,['class'=> 'form-control','placeholder'=>'Seleccione una area','id'=>'id_categoriarepuesto'])!!} 
									</div>
									<div class="form-group">
										<label for="">Modelo:</label>
										{!! Form::select('id_modelos[]', $modelo->marca->modelos->sortBy('nombre_modelo')->pluck('nombre_modelo','id_modelo'),$modelo->id_modelo,['class'=> 'form-control','placeholder'=>'Seleccione una area','id'=>'id_categoriarepuesto']) !!}
									</div>
								</div>
							<button type="button" class="btn btn-danger" onClick="eliminarCompatibilidad({{ $countCiclos }})">Eliminar</button>							
							</div>
						</div>
						 @endforeach

						<div class='form-group'>
						 {!! Form::button('Agregar nueva compatibilidad', ['class'
							=> 'form-control btn btn-success text-white', 'id'=> 'addRol']) !!}
						</div>
						<div class='form-group' id="compatibilidad"></div>
					</div>


					<div class='form-group'>
						{!! Form::submit("Editar Repuesto", ['class' => 'form-control btn btn-success text-white']) !!}
					</div>
					{!! Form::close() !!}
					<div class='form-group'>
						<div id="btnVolver" class="form-control btn btn-success text-white" onclick="location.href='/perfil';"> Volver </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




@stop 
@section('script-js')
<script>
	$(document).ready(function() {

	});	

	var count ={{ $countCiclos }};
	$('#addRol').click(function() {
	count++;
	$('#addRol').parent().append(' <div class="card mt-3"><div class="card-header">Nueva Compatibilidad de Repuesto</div><div class="card-body"><div id="'+count+'">');
						
		$.ajax({
			url: "/selectMarca",
			type: "GET",
			success: function (datos) {
				$("#"+count).html(datos);
			}
			});
	});
	$('#addRol').parent().append('</div></div></div></div>');

	function eliminarCompatibilidad($id){
		$("#tarjetaCompatibilidad"+$id).remove();
	}
</script>



@stop