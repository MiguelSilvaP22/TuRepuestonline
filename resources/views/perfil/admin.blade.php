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

<div class="row mt-5">
    <div class="col-1 ml-5"></div>
    <div class="col-2 ml-5">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab"
                aria-controls="home">Home</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-membresias" role="tab"
                aria-controls="profile">Suscripciones</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-usuarios" role="tab"
                aria-controls="messages">Usuarios</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-repuestos" role="tab"
                aria-controls="settings">Publicaciones</a>
        </div>
    </div>
    <div class="col-7">
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade  show active" id="list-home" role="tabpanel" aria-labelledby="list-messages-list">.asd..</div>

            <div class="tab-pane fade" id="list-membresias" role="tabpanel" aria-labelledby="list-home-list">
                <div class="card card-body">
                    <div class="card">
                        <div class="card-header">
                            Administración de membresias
                        </div>

                        <div class="card-body">
                            <table id="tablaPerfil" class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre Usuario</th>
                                        <th>Fecha de compra</th>
                                        <th>Membresia</th>
                                        <th>Valor</th>
                                        <th>estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario) @if($usuario->compramembresia->count()>0)
                                    <tr>
                                        <td>{{ $usuario->email}}</td>
                                        <td>{{ $usuario->compramembresia->last()->fecha_reg_compramembresia }}</td>
                                        <td>{{ $usuario->compramembresia->last()->membresia->nombre_membresia }}</td>
                                        <td>{{ $usuario->compramembresia->last()->membresia->valor_membresia }}</td>
                                        @if( $usuario->compramembresia->last()->estado_compramembresia==2)
                                        <td>
                                            <p>sin confirmar</p>
                                        </td>
                                        <td><button class="btn btn-success" onclick="location.href='activarMembresia/{{ $usuario->compramembresia->last()->id_compramembresia }}';"> Activar membresia</button></td>
                                        @endif @if( $usuario->compramembresia->last()->estado_compramembresia==1)
                                        <td>
                                            <p>Activada</p>
                                        </td>
                                        <td></td>
                                        @endif
                                    </tr>
                                    @endif @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="list-usuarios" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="card card-body">
                    <div class="card">
                        <div class="card-header">
                            Administración de Usuarios
                        </div>

                        <div class="card-body">
                            <table id="tablaPerfil" class="table">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Perfil</th>
                                        <th>Membresia</th>
                                        <th>Repuestos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->email}}</td>
                                        <td>{{ $usuario->perfil->nombre_perfil }}</td>
                                        <td>{{ $usuario->membresia->nombre_membresia }}</td>
                                        <td>{{ $usuario->repuestos->count() }}</td>
                                        <td>
                                            <button class="btn btn btn-warning" id="editUsuario"  onclick="location.href='editarUsuario/{{ $usuario->id_usuario }}';" value=""><i class="fa fa-edit"></i>Editar</button>
                                            <button class="btn btn btn-danger" data-toggle="modal" data-target="#eliminarUsuarioModal{{ $usuario->id_usuario }}" ><i class="fa fa-eraser"></i>Eliminar</button></td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="eliminarUsuarioModal{{ $usuario->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminar Usuario</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Esta seguro que desea eliminar al usuario: {{ $usuario->email}} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="button" class="btn btn-danger" onclick="location.href='eliminarUsuario/{{ $usuario->id_usuario }}';">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-repuestos" role="tabpanel" aria-labelledby="list-messages-list">
                    <div class="card card-body">
                            <div class="card">
                                <div class="card-header">
                                    Administración de Publicaciones
                                </div>
        
                                <div class="card-body">
                                    <table id="tablaPerfil" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre Usuario</th>
                                                <th>Fecha de compra</th>
                                                <th>Fecha de Registro</th>
                                                <th>dueño</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($repuestos as $repuesto) 
                                            <tr>
                                                <td>{{ $repuesto->nombre_repuesto }}</td>
                                                <td>{{ $repuesto->categoriarepuesto->nombre_categoriarepuesto }}</td>
                                                <td>{{ $repuesto->fecha_reg_repuesto }}</td>
                                                <td>{{ $repuesto->usuario->email}}</td>
                                                <td>
                                                    <button class="btn btn btn-warning" id="editCompetencia" value="" onclick="location.href='editarRepuesto/{{ $repuesto->id_repuesto }}';"><i class="fa fa-edit"></i>Editar</button>
                                                    <button class="btn btn btn-danger" data-toggle="modal" data-target="#eliminarRepuestoModal{{ $repuesto->id_repuesto  }}" ><i class="fa fa-eraser"></i>Eliminar</button></td>
        
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="eliminarRepuestoModal{{ $repuesto->id_repuesto }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminar Repuesto</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Esta seguro que desea eliminar el Repuesto: {{ $repuesto->nombre_repuesto }} ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-danger" onclick="location.href='eliminarRepuesto/{{ $repuesto->id_repuesto }}';">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
        </div>
    </div>
</div>

@stop 
@section('script-js')

<script>

</script>



@stop