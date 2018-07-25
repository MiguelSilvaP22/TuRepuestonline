
<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Empresa') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

<div class="form-group row">
    <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

    <div class="col-md-6">
        <input id="direccion" type="text" class="form-control" name="direccion" required>
    </div>
</div>

<div class="form-group row">
    <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Rut Empresa') }}</label>

    <div class="col-md-6">
        <input id="rut_empresa" type="text" class="form-control" name="rut_empresa" required>
    </div>
</div>

<div class="form-group row">
    <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

    <div class="col-md-6">
        <input id="fono" type="number" class="form-control" name="fono"  required>
    </div>
</div>

<div class="form-group row">
        <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sitio WEB') }}</label>

        <div class="col-md-6">
            <input id="web" type="text" class="form-control" name="web" >
        </div>
</div>


<script>
     $(function() {

        $( "#rut_empresa" ).keyup(function() {
            console.log($(this).val($(this).val().replace('.', '')));
            });
    });
    </script>
