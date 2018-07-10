
<div class="form-group modelo mt-3">
    {!! Form::label('', 'Modelo:') !!}
    {!! Form::select('id_modelos[]', $modelos,null ,['class' => 'form-control select_modelo','placeholder'=>'Seleccione un modelo de Vehiculo','id'=>'select_modelo', 'style'=>'width:100%', 'required']) !!}         
</div>
