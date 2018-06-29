@extends('ecommerce.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_responsive.css">
@stop

@section('content')
<div class="row mt-6">
    <div class="col-2"></div>
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                Perfil
            </div>
            <div class="card-body">
                <h5 class="card-title">Información del perfil</h5>
                <ul class="card-text mt-4">RUT: Prueba </ul>
                <ul class="card-text mt-2">Nombre Completo: Armin Burns</ul> 
                <ul class="card-text mt-2">Teléfono: Prueba  Dirección: Prueba</ul> 
                <ul class="card-text mt-2">Correo Electronico: Prueba</ul> 
                <a href="#" class="btn btn-primary mt-2">Editar</a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-md-center mt-4">
    <div class="col-7">
        <div class="card" >
            <div class="card-header">
                Repuestos Publicados
            </div>
            <div class="card-body">
            <table id="tablaPerfil" class="table">
                <thead>
                    <tr>
                        <th>Nombre Repuesto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repuestos as $repuesto) 
                    <tr>
                        <td style="width:25%;">{{ $repuesto->nombre_repuesto}}</td>
                        <td style="width:25%;">{{ $repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                        <td style="width:25%;">{{ $repuesto->precio_repuesto}}</td>
                        <td style="width:25%;">{{ $repuesto->fecha_reg_repuesto}}</td>

                        <td>
                        <button id="btnVer" onclick="location.href='detallerepuesto/{{$repuesto->id_repuesto}}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button>
                        <button class="btn btn btn-info" id="editCompetencia" value=""><i class="fa fa-edit"></i>Editar</button>
                        <button class="btn btn btn-info" onclick=""><i class="fa fa-eraser"></i>Eliminar</button>
                        </td>
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
