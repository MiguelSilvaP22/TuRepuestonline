
<div class="form-group motor mt-3">
    {!! Form::label('', 'Modelo de Motor:') !!}
    {!! Form::select('id_motor', $motores,null ,['class' => 'form-control select_modelo','placeholder'=>'Seleccione un modelo de Vehiculo','id'=>'select_motoreso', 'style'=>'width:100%']) !!}         
</div>
