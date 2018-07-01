
<div class="form-group modelo mt-3">
    {!! Form::label('', 'Modelo:') !!}
    {!! Form::select('id_modelos[]', $modelos,null ,['class' => 'form-control select_modelo','placeholder'=>'Seleccione un modelo de Vehiculo','id'=>'select_modelo', 'style'=>'width:100%']) !!}         
</div>

<script>

$('select').click(function() {
    var selectMarca = this;
    $.ajax({
        url: "/selectMotor/"+this.value,
        type: "GET",
        success: function (datos) {
            $(selectMarca).siblings('.motor').remove();
            $(selectMarca).parent().append(datos)
            }
        });

});
</script>