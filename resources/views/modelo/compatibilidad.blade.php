
<div class="form-group">
    {!! Form::label('', 'Modelo:') !!}
    {!! Form::select('id_modelos', $modelos,null ,['class' => 'select2 select_modelo','placeholder'=>'Seleccione un modelo de Vehiculo','id'=>'select_modelo', 'style'=>'width:100%']) !!}         
</div>
