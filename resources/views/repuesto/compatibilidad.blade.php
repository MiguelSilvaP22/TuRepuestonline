<div class="form-group">
    {!! Form::label('', 'Compatibilidad:') !!}
    {!! Form::select('id_categoriarepuesto', $marcas,null ,['class' => 'select2','placeholder'=>'Seleccione una Marca de Vehiculo','id'=>'id_marca', 'style'=>'width:100%']) !!}         
</div>