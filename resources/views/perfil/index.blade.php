@extends('ecommerce.layout') 
@section('css')
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_responsive.css">
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    /* Styling h1 and links
––––––––––––––––––––––––––––––––– */

    #evaluacionEstrellas h1[alt="Simple"] {
        color: white;
    }

    #evaluacionEstrellas a[href],
    #evaluacionEstrellas a[href]:hover {
        color: grey;
        font-size: 0.5em;
        text-decoration: none
    }



    #evaluacionEstrellas .starrating>input {
        display: none;
    }

    /* Remove radio buttons */

    #evaluacionEstrellas .starrating>label:before {
        content: "\f005";
        /* Star */
        margin: 2px;
        font-size: 5em;
        font-family: FontAwesome;
        display: inline-block;
    }

    #evaluacionEstrellas .starrating>label {
        color: #222222;
        /* Start color when not clicked */
    }

    #evaluacionEstrellas .starrating>input:checked~label {
        color: #ffca08;
    }

    /* Set yellow color when star checked */

    #evaluacionEstrellas .starrating>input:hover~label {
        color: #ffca08;
    }

    /* Set yellow color when star hover */
</style>

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
            @else EMPRESA @endif

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
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->repuesto->nombre_repuesto}}</td>
                                    <td>{{ $compra->repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                                    <td>{{ $compra->repuesto->precio_repuesto}}</td>
                                    <td>{{ $compra->fecha_reg_venta}}</td>

                                    @if($compra->estado_venta==1)
                                    <td>Por confirmar</td>
                                    @endif @if($compra->estado_venta==2)
                                    <td>En Evaluación</td>
                                    @endif @if($compra->estado_venta==3)
                                        <td>Finalizada
                                        <br>
                                            @for($i=1; $i<=5; $i++)
                                                @if($compra->evaluacion->last()->nota_comprador_evaluacion>=$i)
                                                    <i class="fa fa-star fa-1x" aria-hidden="true" style="color:gold"></i>
                                                @endif
                                            @endfor
                                        </td> 
                                    @endif


                                    <td>
                                        <button id="btnVer" onclick="location.href='detallerepuesto/{{   $compra->repuesto->id_repuesto}}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button>
                                    </td>

                                    <td>
                                        @if($compra->estado_venta==2 && $compra->nota_vendedor_evaluacion==0)
                                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Evaluar Comprador</button></td>

                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Evaluar Vendedor</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    {!! Form::open(['action' => 'VentaController@evaluarvendedor','id'=>'EvaluacionVendedor']) !!}
                                                    <div class="modal-body">
                                                        <div class="container" id="evaluacionEstrellas">
                                                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label
                                                                    for="star5" title="5 star">5</label>
                                                                    <input type="radio" id="star4" name="rating" value="4" />
                                                                    <label
                                                                        for="star4" title="4 star">4</label>
                                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                                        <label
                                                                            for="star3" title="3 star">3</label>
                                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                                            <label
                                                                                for="star2" title="2 star">2</label>
                                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                                <label
                                                                                    for="star1" title="1 star">1</label>
                                                                                    <input type="hidden" name="id_venta" value="{{ $compra->id_venta }}">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Evaluar</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
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
                                    <td>{{ $venta->nombre_repuesto }}</td>
                                    <td>{{ $venta->precio_repuesto }}</td>
                                    <td>{{ $venta->nombres_personanatural }} <br>{{ $venta->apellidos_personanatural }}</td>
                                    <td>{{ $venta->fecha_reg_venta }}</td>
                                    @if($venta->estado_venta==1)
                                    <td>Por confirmar</td>
                                    @endif @if($venta->estado_venta==2)
                                    <td>En Evaluación</td>
                                    @endif @if($venta->estado_venta==3)
                                    <td>Finalizada
                                    <br>
                                            @for($i=1; $i<=5; $i++)
                                                @if($venta->nota_vendedor_evaluacion>=$i)
                                                    <i class="fa fa-star fa-1x" aria-hidden="true" style="color:gold"></i>
                                                @endif
                                            @endfor
                                        </td> 
                                    @endif

                                    <td>
                                        <button id="btnVer" onclick="location.href='detallerepuesto/{{ $venta->id_repuesto }}';" class="btn btn btn-info"><i class="fa fa-eye"></i>Ver</button>                                        @if($venta->estado_venta==1)

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Confirmar venta
                                            </button>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Producto</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Esta seguro que desea confirmar la venta del repuesto: {{ $venta->nombre_repuesto }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Calcelar venta</button>
                                                        <button type="button" class="btn btn-primary" onclick="location.href='confirmarventa/{{$venta->id_venta}}';">Confirmar Venta</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif 
                                        @if($venta->estado_venta==2 && $venta->nota_comprador_evaluacion==0)
                                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Evaluar Comprador</button></td>

                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Evaluar Comprador</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                    </div>
                                                    {!! Form::open(['action' => 'VentaController@evaluarcomprador','id'=>'EvaluacionComprador']) !!}
                                                    <div class="modal-body">
                                                        <div class="container" id="evaluacionEstrellas">
                                                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="5 star">5</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="4 star">4</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="3 star">3</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="2 star">2</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="1 star">1</label>
                                                                <input type="hidden" name="id_venta" value="{{ $venta->id_venta }}">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Confirmar Venta</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
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