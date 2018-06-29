@extends('ecommerce.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_responsive.css">
@stop

@section('content')

<div class="row justify-content-md-center mt-4">
    <div class="col-7">
        <div class="card" >
            <div class="card-header">
                Mis Favoritos
            </div>
            <div class="card-body">
            <table id="tablaPerfil" class="table">
                <thead>
                    <tr>
                        <th>Nombre Repuesto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favoritos as $favorito) 
                    <tr>
                        <td style="width:25%;">{{ $favorito->repuesto->last()->nombre_repuesto}}</td>
                        <td style="width:25%;">{{ $favorito->repuesto->last()->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                        <td style="width:25%;">{{ $favorito->repuesto->last()->precio_repuesto}}</td>
                        <td><button id="btnVer" onclick="location.href='detallerepuesto/{{$favorito->repuesto->last()->id_repuesto}}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button></td>

                    </tr>
                    @endforeach
                    
                        
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


@stop 

@section('script-js')

<script>    
$(document).ready(function() {

$('#tablaPerfil').DataTable({
        
    });
} );
</script>

@stop
