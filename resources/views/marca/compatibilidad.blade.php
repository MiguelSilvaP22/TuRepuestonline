
<div class="form-group">
    {!! Form::label('', 'Compatibilidad:') !!}
    {!! Form::select('id_marca', $marcas,null ,['class' => 'select2','placeholder'=>'Seleccione una Marca de Vehiculo','id'=>'select_marca', 'style'=>'width:100%']) !!}         
</div>

<script>

	$(document).on('click', '#select_marca', function () {
		$.ajax({
			url: "/selectModelo/"+this.value,
			type: "GET",
			success: function (datos) {
				$("#compatibilidad2").html(datos);
				
			}
			});
	});
</script>