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

<div class="row">
    <div class="col-3"></div>
    <div class="col-md-4 col-sm-12 mt-5 ">
        <div class="card">
            <div class="card-header">
                Perfil
            </div>
            @if($usuario->perfil->id_perfil==1)
            
                <div class="card-body">
                    <ul class="card-text mt-4">RUT: {{ $usuario->personanatural->last()->run_personanatural }} </ul>
                    <ul class="card-text mt-2">Nombre: {{ $usuario->personanatural->last()->nombres_personanatural }}</ul>
                    <ul class="card-text mt-2">Apellido: {{ $usuario->personanatural->last()->apellidos_personanatural }}</ul>
                    <ul class="card-text mt-2">Teléfono: {{ $usuario->personanatural->last()->fono_personanatural }}</ul>
                    <ul class="card-text mt-2">Correo Electronico: {{ $usuario->email }}</ul>
                    <ul class="card-text mt-2">Membresia: {{ $usuario->membresia->nombre_membresia }}</ul>
                    <ul class="card-text mt-2">Membresia expira en: {{ $expiracionMembresia->format('%m') }} Meses y {{ $expiracionMembresia->format('%d') }} dias </ul>
                    <ul class="card-text mt-2">promedio nota ventas: 
                        @if(count($evaluacionVendedor)>0)
                        {{round(array_sum($evaluacionVendedor)/count($evaluacionVendedorr), 1)}}
                        @else
                            No tiene ventas evaluadas.
                        @endif
                    </ul>
                    <ul class="card-text mt-2">promedio nota compras: 
                        @if(count($evaluacionComprador)>0)
                        {{round(array_sum($evaluacionComprador)/count($evaluacionComprador), 1)}}
                        @else
                            No tiene compras evaluadas.
                        @endif
                    </ul>
                    <div class="botonesPerfil mt-3"></div>
                        <a href="#" class="btn btn-info mr-3">Editar perfil</a><a href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalMembresiaUsuarioNatural">Comprar Membresia</a>
                    </div>


                    <!-- Modal Compra Membresia  -->
                    <div class="modal fade" id="ModalMembresiaUsuarioNatural" tabindex="-1" role="dialog" aria-labelledby="ModalMembresiaUsuarioNatural" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comprar Membresia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body modalMembresia">
                            <div class="row">
                                <div class="col-md-11">
                                    <select name="selectMembresia" id="selectMembresiaUsuario" class="form-control ">
                                        <option value="2">Plata $3.000</option>
                                        <option value="3">Oro $7.500</option>
                                        <option value="4">Diamante $13.500</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-11">

                                    <p>para comprar la membresia porfavor realice un deposito en bla bla bla nla </p>
                                    <p>Numero de cuenta: 558445</p>
                                    <p>Banco: Chile</p>
                                    <p>Tipo de cuenta: Cuenta Corriente</p>

                                </div>


                            </div>
                            
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary membresiaBotonCompra" onclick="confirmarComprarEmpresa()">Comprar Membresia</button>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            @endif 
            @if($usuario->perfil->id_perfil==2)
            <div class="card-body">
                    <ul class="card-text mt-4">RUT: {{ $usuario->empresa->last()->rut_empresa }}</ul>
                    <ul class="card-text mt-2">Nombre: {{ $usuario->empresa->last()->nombre_empresa }}</ul>
                    <ul class="card-text mt-2">Dirección: {{ $usuario->empresa->last()->direccion_empresa }}</ul>
                    <ul class="card-text mt-2">Teléfono: {{ $usuario->empresa->last()->fono_empresa }}</ul>
                    <ul class="card-text mt-2">Correo Electronico: {{ $usuario->email }}</ul>
                    <ul class="card-text mt-2">Membresia: {{ $usuario->membresia->nombre_membresia }}</ul>
                    <ul class="card-text mt-2">Membresia expira en: {{ $expiracionMembresia->format('%m') }} Meses y {{ $expiracionMembresia->format('%d') }} dias </ul>
                    <ul class="card-text mt-2">promedio nota ventas: 
                        @if(count($evaluacionVendedor)>0)
                        {{round(array_sum($evaluacionVendedor)/count($evaluacionVendedorr), 1)}}
                        @else
                            No tiene ventas evaluadas.
                        @endif
                    </ul>
                    <ul class="card-text mt-2">promedio nota compras: 
                        @if(count($evaluacionComprador)>0)
                            {{round(array_sum($evaluacionComprador)/count($evaluacionComprador), 1)}}
                        @else
                            No tiene compras evaluadas.
                        @endif
                    
                    </ul>
                    <div class="botonesPerfil mt-3"></div>
                        <a href="#" class="btn btn-info mr-3">Editar perfil</a><a href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalMembresiaUsuarioNatural">Comprar Membresia</a>
                    </div>

                    <!-- Modal Compra Membresia  -->
                    <div class="modal fade" id="ModalMembresiaUsuarioNatural" tabindex="-1" role="dialog" aria-labelledby="ModalMembresiaUsuarioNatural" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comprar Membresia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-md-11">
                                    <select name="" id="selectMembresiaEmpresa" class="form-control">
                                            <option value="4">Plata $24.000</option>
                                            <option value="5">Oro $28.600</option>
                                            <option value="6">Diamante $33.600</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-11">

                                <p>para comprar la membresia porfavor realice un deposito en bla bla bla nla </p>
                                <p>Numero de cuenta: 558445</p>
                                <p>Banco: Chile</p>
                                <p>Tipo de cuenta: Cuenta Corriente</p>

                                </div>


                            </div>
                            
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary"  onclick="confirmarComprar()">Comprar Membresia</button>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </div>
</div>

<div class="row justify-content-md-center mb-5">
    <div class="col-md-7 col align-self-center mt-5">
        <h4>Informacion de Repuestos</h4>
            <div class="card text-center">
                    <div class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="true" aria-controls="collapseExample">Publicados</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample">Comprados</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample">Vendidos</a>
                        </li>
                      </ul>
                    </div>
                  
                    <!-- Repuestos Publicados  -->
        <div class="collapse active" id="collapseExample2">
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
                                    <th>Duracion publicación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($repuestos as $repuesto)
                                <tr>
                                    <td >{{ $repuesto->nombre_repuesto}}</td>
                                    <td >{{ $repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                                    <td >{{ $repuesto->precio_repuesto}}</td>
                                    <td >{{ $repuesto->fecha_reg_repuesto}}</td>)
                                    <td>
                                        @if($now->diffInDays($repuesto->fecha_reg_repuesto->addDays($repuesto->usuario->membresia->dias_duracion_publidacion_membresia), false)>0)
                                         {{ $now->diffInDays($repuesto->fecha_reg_repuesto->addDays($repuesto->usuario->membresia->dias_duracion_publidacion_membresia), false) }} dias restantes.
                                         @else
                                            <p>Publicacion Finalizada por tiempo.</p>
                                         @endif
                                    </td>
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
        
                    <!-- Repuestos Comprados  -->

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
                                    <th>Repuesto</th>
                                    <th>Unidades</th>
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
                                    <td>{{ $compra->cantidad_venta}}</td>

                                    <td>{{ $compra->repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</td>
                                    <td>${{ number_format($compra->repuesto->precio_repuesto)}}</td>
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
                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfoVendedor{{ $compra->id_venta }}">
                                                Info Vendedor

                                            </button>         
                                        <div class="modal fade" id="modalInfoVendedor{{ $compra->id_venta }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Informacion Vendedor</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($compra->repuesto->usuario->id_perfil==2)
                                                            <ul class="card-text mt-4">RUT: {{ $compra->repuesto->usuario->empresa->last()->rut_empresa }}</ul>
                                                            <ul class="card-text mt-2">Nombre: {{ $compra->repuesto->usuario->empresa->last()->nombre_empresa }}</ul>
                                                            <ul class="card-text mt-2">Dirección: {{ $compra->repuesto->usuario->empresa->last()->direccion_empresa }}</ul>
                                                            <ul class="card-text mt-2">Teléfono: {{ $compra->repuesto->usuario->empresa->last()->fono_empresa }}</ul>
                                                            <ul class="card-text mt-2">Correo Electronico: {{ $compra->repuesto->usuario->email }}</ul>
                                                            <ul class="card-text mt-2">  Pagina Web:<a href="{{ $compra->repuesto->usuario->empresa->last()->web_empresa }}"> {{ $compra->repuesto->usuario->empresa->last()->web_empresa }} </a></ul>
                                                        @else 
                                                            <ul class="card-text mt-4">RUT: {{  $compra->repuesto->usuario->personanatural->last()->run_personanatural }} </ul>
                                                            <ul class="card-text mt-2">Nombre: {{ $compra->repuesto->usuario->personanatural->last()->nombres_personanatural }}</ul>
                                                            <ul class="card-text mt-2">Apellido: {{  $compra->repuesto->usuario->personanatural->last()->apellidos_personanatural }}</ul>
                                                            <ul class="card-text mt-2">Teléfono: {{  $compra->repuesto->usuario->personanatural->last()->fono_personanatural }}</ul>
                                                            <ul class="card-text mt-2">Correo Electronico: {{  $compra->repuesto->usuario->email }}</ul>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
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
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
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
                                        <td>{{ $venta->cantidad_venta }}</td>
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

                                @foreach ($ventasEmpresas as $venta)
                                <tr>
                                    <td>{{ $venta->nombre_repuesto }}</td>
                                    <td>{{ $venta->cantidad_venta }}</td>
                                    <td>{{ $venta->precio_repuesto }}</td>
                                    <td>{{ $venta->nombre_empresa }} </td>
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
</div>




@stop 
@section('script-js')

<script>
    $(document).ready(function() {

        $('#tablaPerfil').DataTable({
            });
        
        $('#collapseExample2').collapse('show');
} );

function confirmarComprar() {
    $.ajax({
        url: '/solicitudMembresia/'+$("#selectMembresiaUsuario option:selected").val(),
        type: "GET",
        success: function () {
            $(".modalMembresia").html("Membresia Solicitada, una vez realizado el pago a la cuenta, se activara su cuenta en 24horas.")
            $(".membresiaBotonCompra").remove(); 
        }
        });
}

function confirmarComprarEmpresa() {
    $.ajax({
        url: '/solicitudMembresia/'+$("#selectMembresiaEmpresa option:selected").val(),
        type: "GET",
        success: function () {
            console.log("Ok")
            $(".modalMembresia").html("Membresia Solicitada, una vez realizado el pago a la cuenta, se activara su cuenta en 24horas.")
            $(".membresiaBotonCompra").remove(); 
        }
        });
}

</script>


@stop