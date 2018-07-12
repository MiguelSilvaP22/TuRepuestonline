
<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

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
        <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

        <div class="col-md-6">
            <input id="apellidos" type="text" class="form-control" name="apellidos" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('RUN') }}</label>

        <div class="col-md-6">
            <input id="rut" type="text" class="form-control" name="rut" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="nombres-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

        <div class="col-md-6">
            <input id="fono" type="number" class="form-control" name="fono" required>
        </div>
    </div>