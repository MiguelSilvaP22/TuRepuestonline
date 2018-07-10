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
			alert("Error, debe ingresar un tipo de conpatibilidad para el repuesto");
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
				<div class="card-header">Crear Repuesto</div>

				<div class="card-body">
					{!! Form::open(['enctype'=>"multipart/form-data", 'action' => 'RepuestoController@store','id'=>'formRepuesto', 'files' =>
					true, 'onsubmit'=>"return validarForm(this)"]) !!}
					<div class='form-group'>
						{!! Form::label('', 'Nombre:') !!} {!! Form::text('nombre_repuesto', null, ['class' => 'form-control','id'=>'nombre_repuesto','maxlength'=>'199', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Categoria Repuesto:') !!} {!! Form::select('id_categoriarepuesto', $categoriasrepuestos,null ,['class'=> 'form-control','placeholder'=>'Seleccione una area','id'=>'id_categoriarepuesto', 'required']) !!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Precio:') !!} {!! Form::number('precio_repuesto', null, ['class' => 'form-control','min'=> '0', 'id'=>'precio_repuesto','maxlength'=>'199', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Stock:') !!} {!! Form::number('stock_repuesto', null, ['class' => 'form-control', 'min'=> '0','id'=>'stock','maxlength'=>'199','maxlength'=>'199', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Descripción:') !!} {!! Form::textArea('descripcion_repuesto', null, ['class' => 'form-control','id'=>'descripcion_repuesto','maxlength'=>'999', 'required'])
						!!}
					</div>
					<div class='form-group'>
						{!! Form::label('', 'Imagenes:') !!} {!! Form::input('file','imagen_repuesto1', null, ['class' => 'form-control','id'=> 'imagen_repuesto1', 'required'])
						!!} {!! Form::input('file','imagen_repuesto2', null, ['class' => 'form-control','id'=> 'imagen_repuesto2']) !!} {!!
						Form::input('file','imagen_repuesto3', null, ['class' => 'form-control','id'=> 'imagen_repuesto3']) !!}

					</div>

					<div class='form-group' id="compatibilidad23">
						<div class='form-group' id="compatibilidad">

						</div>
					</div>
					<div class='form-group'>
							{!! Form::label('nombre_rolesdesempeno', 'Roles de desempeño:') !!} {!! Form::button('Agregar nueva compatibilidad', ['class'
							=> 'form-control btn btn-info text-white', 'id'=> 'addRol']) !!}
					</div>


					<div class='form-group'>
							{!! Form::submit("Agregar Repuesto", ['class' => 'form-control btn btn-success text-white', 'id'=>'uploadButton']) !!}
					</div>
						{!! Form::close() !!}
					<div class='form-group'>
						<div id="btnVolver" class="form-control btn btn-success text-white"> Volver </div>
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

		$('INPUT[type="file"]').change(function () {
			var ext = this.value.match(/\.(.+)$/)[1];
			switch (ext) {
				case 'jpg':
				case 'jpeg':
				case 'png':
				case 'gif':
					$('#uploadButton').attr('disabled', false);
					break;
				default:
					alert('El tipo de imagen no es compatible.');
					this.value = '';
			}
		});
	});	

	var count =0;
	$('#addRol').click(function() {
	count++;
	$('#addRol').parent().append(' <div class="card mt-3"><div class="card-header CompatibilidadRepuesto">Nueva Compatibilidad de Repuesto</div><div class="card-body"><div id="'+count+'">');
						
		$.ajax({
			url: "/selectMarca",
			type: "GET",
			success: function (datos) {
				$("#"+count).html(datos);
			}
			});
	});
	$('#addRol').parent().append('</div></div></div></div>');

	

</script>


@stop