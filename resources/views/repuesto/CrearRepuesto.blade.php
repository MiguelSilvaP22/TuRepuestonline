@extends('ecommerce.layout')
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css">
@stop
@section('content')

  <div class="row justify-content-md-center">
		<div class="col-4">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Repuesto</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['enctype'=>"multipart/form-data", 'action' => 'RepuestoController@store','id'=>'formRepuesto', 'files' => true]) !!}
				<div class='form-group'>
					{!! Form::label('', 'Nombre:') !!}
					{!! Form::text('nombre_repuesto', null, ['class' => 'form-control','id'=>'nombre_repuesto','maxlength'=>'199']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('', 'Categoria Repuesto:') !!}
                    {!! Form::select('id_categoriarepuesto', $categoriasrepuestos,null ,['class' => 'select2','placeholder'=>'Seleccione una area','id'=>'id_categoriarepuesto', 'style'=>'width:100%']) !!}         
                </div>
                <div class='form-group'>
					{!! Form::label('', 'Precio:') !!}
					{!! Form::number('precio_repuesto', null, ['class' => 'form-control','id'=>'precio_repuesto','maxlength'=>'199']) !!}
                </div>
                <div class='form-group'>
					{!! Form::label('', 'Stock:') !!}
					{!! Form::number('stock_repuesto', null, ['class' => 'form-control', 'min'=> '0','id'=>'stock','maxlength'=>'199']) !!}
                </div>
                <div class='form-group'>
					{!! Form::label('', 'Descripción:') !!}
					{!! Form::textArea('descripcion_repuesto', null, ['class' => 'form-control','id'=>'descripcion_repuesto','maxlength'=>'999']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('', 'Imagenes:') !!}
                    {!! Form::input('file','imagen_repuesto1', null, ['class' => 'form-control','id'=> 'imagen_repuesto1']) !!}
                    {!! Form::input('file','imagen_repuesto2', null, ['class' => 'form-control','id'=> 'imagen_repuesto2']) !!}
                    {!! Form::input('file','imagen_repuesto3', null, ['class' => 'form-control','id'=> 'imagen_repuesto3']) !!}

                </div>	

				<div class='form-group' id="compatibilidad23">

					<div class='form-group'>
						{!! Form::label('nombre_rolesdesempeno', 'Roles de desempeño:') !!}	
						{!! Form::button('Agregar nueva compatibilidad', ['class' => 'form-control btn btn-success ', 'id'=> 'addRol']) !!}	
					</div>
					<div class='form-group' id="compatibilidad"></div>
					
					
				</div>

				
				<div class='form-group'>
					{!! Form::submit("Agregar Area", ['class' => 'form-control btn btn-success ']) !!}
				</div>
				{!! Form::close() !!}
				<div class='form-group'>
					<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
				</div>
				</div>
			</div>
		</div>
    </div>
    
@stop


@section('script-js')
<script>
	$(document).ready(function() {

/*	$.ajax({
		url: "/selectMarca",
		type: "GET",
		success: function (datos) {
			$("#compatibilidad").after(datos);
		}
		});*/
	});	

	var count =0;
	$('#addRol').click(function() {
	count++;

/*	$('#addRol').parent().append('<input class="form-control" name="RolDesempenos[]" id="rolDesempeno'+count+'" type="text" ">');
	$('#addRol').parent().append('<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarRol('+count+')" id="btnEliminarRol'+count+'">   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </button>');
	$('#addRol').parent().append('<label id="errRolDesempeno'+count+'">');*/

	$('#addRol').parent().append('<div id="'+count+'">');
		$.ajax({
			url: "/selectMarca",
			type: "GET",
			success: function (datos) {
				$("#"+count).html(datos);
			}
			});
	});
	$('#addRol').parent().append('</div>');

		


</script>
@stop