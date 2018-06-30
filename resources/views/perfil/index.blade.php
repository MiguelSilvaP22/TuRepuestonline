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
            @if($usuario->perfil->id_perfil==1)
            <div class="card-body">
                <h5 class="card-title">Información del perfil</h5>
                <ul class="card-text mt-4">RUT: {{ $usuario->personanatural->last()->run_personanatural }} </ul>
                <ul class="card-text mt-2">Nombre: {{ $usuario->personanatural->last()->nombres_personanatural }}</ul>
                <ul class="card-text mt-2">Apellido: {{ $usuario->personanatural->last()->apellidos_personanatural }}</ul>
                <ul class="card-text mt-2">Teléfono: {{ $usuario->personanatural->last()->fono_personanatural }}a</ul>
                <ul class="card-text mt-2">Correo Electronico: {{ $usuario->email }}</ul>
                <a href="#" class="btn btn-primary mt-2">Editar</a>
            </div>
            @else
            OHHH
            @endif

        </div>
    </div>
</div>

<div class="row justify-content-md-center mt-4">
    <div class="col-7">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver Repuestos Publicados
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver Repuestos Comprados
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver Repuestos Vendidos
            </a>
        </p>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <div class="card">
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

        <div class="collapse" id="collapseExample3">
            <div class="card card-body">
                <div class="card">
                    <div class="card-header">
                        Repuestos Comprados
                    </div>

                    <div class="card-body">
                        <table id="tablaPerfil" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre Repuesto</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Fecha de compra</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                <tr>
                                    <td style="width:25%;">{{ $compra->repuesto->nombre_repuesto}}</td>
                                    <td style="width:25%;">{{ $compra->repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                                    <td style="width:25%;">{{ $compra->repuesto->precio_repuesto}}</td>
                                    <td style="width:25%;">{{ $compra->fecha_reg_venta}}</td>

                                    <td>
                                        <button id="btnVer" onclick="location.href='detallerepuesto/{{   $compra->repuesto->id_repuesto}}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseExample1">
            <div class="card card-body">
                <div class="card">
                    <div class="card-header">
                        Repuestos Vendidos
                    </div>

                    <div class="card-body">
                        <table id="tablaPerfil" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre Repuesto</th>
                                    <th>Precio</th>
                                    <th>Comprador</th>
                                    <th>Fecha de Venta</th>
                                    <th>Estado Venta</th>

                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $venta)
                                <tr>
                                    <td >{{ $venta->nombre_repuesto }}</td>
                                    <td >{{ $venta->precio_repuesto }}</td>
                                    <td >{{ $venta->nombres_personanatural }} {{ $venta->apellidos_personanatural }}</td>
                                    <td >{{ $venta->fecha_reg_venta }}</td>
                                    @if($venta->estado_venta==1)
                                        <td >Por confirmar</td>
                                    @endif

                                    <td>
                                        <button id="btnVer" onclick="location.href='detallerepuesto/{{ $venta->id_repuesto }}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button>
                                        @if($venta->estado_venta==1)
                                            <button id="btnVer" onclick="location.href='detallerepuesto/{{ $venta->id_repuesto }}';" class="btn btn btn-info"><i class="fa fa-check"></i>Confirmar Venta</button>
                                        @endif
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
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