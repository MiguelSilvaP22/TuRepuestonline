
<div class="form-group">
    {!! Form::label('', 'Modelo:') !!}
    {!! Form::select('id_modelos[]', $modelos,null ,['class' => 'select2 select_modelo','placeholder'=>'Seleccione un modelo de Vehiculo','id'=>'select_modelo', 'style'=>'width:100%']) !!}         
</div>

<script>

$('select').click(function() {
    var selectMarca = this;
    $.ajax({
        url: "/selectMotor/"+this.value,
        type: "GET",
        success: function (datos) {
            $(selectMarca).parent().append(datos)
            }
        });

});
</script>