
<div class="form-group">
    {!! Form::label('', 'Marca:') !!}
    {!! Form::select('id_marca[]', $marcas,null ,['class' => 'form-control','placeholder'=>'Seleccione una Marca de Vehiculo','id'=>'select_marca', 'style'=>'width:100%']) !!}         
</div>


<script>

	$('select').change(function() {
		var selectMarca = this;
		$.ajax({
			url: "/selectModelo/"+this.value,
			type: "GET",
			success: function (datos) {
				$(selectMarca).siblings('.modelo').remove();
				$(selectMarca).siblings('.motor').remove();
				$(selectMarca).parent().append(datos)
				
				}
			});

	});
</script>