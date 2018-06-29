
<div class="form-group">
    {!! Form::label('', 'Compatibilidad:') !!}
    {!! Form::select('id_marca[]', $marcas,null ,['class' => 'select2','placeholder'=>'Seleccione una Marca de Vehiculo','id'=>'select_marca', 'style'=>'width:100%']) !!}         
</div>


<script>

	$('select').click(function() {
		var selectMarca = this;
		$.ajax({
			url: "/selectModelo/"+this.value,
			type: "GET",
			success: function (datos) {
				$(selectMarca).parent().append(datos)
				}
			});

	});
</script>