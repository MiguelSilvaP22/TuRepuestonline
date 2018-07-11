@extends('ecommerce.layout')
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css">
@section('content')
<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
                            <form id="formBusqueda2">
                                <div class="sidebar_title">Busqueda repuesto</div>
                                {!! Form::select('id_marca', $marcas,null ,['class' => 'form-control mt-3','placeholder'=>'Seleccione una Marca de Vehiculo','id'=>'selectMarcas', 'style'=>'width:100%']) !!}         
                            </form>
						</div>

                        <form id="formBusqueda">
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Categorias</div>
                                @foreach($categoriasrepuestos as $categoria)
                                <div class='form-group'>
                                  {!! Form::checkbox('id_categoria[]', $categoria->id_categoriarepuesto, false, ['class' => 'form-check-input','id'=>'$categoria->id_categoria']) !!}
                                 <label class="form-check-label" for="defaultCheck1">
                                   {{$categoria->nombre_categoriarepuesto}}
                                </label>
                                </div>

                                @endforeach
                            </div>
                            <div class="form-group">

                            </form>
                        </div>
                        {!! Form::close() !!}
					</div>

				</div>

				<div class="col-lg-9">
					       
					<!-- Shop Content -->
                    <div class="shopContent">
                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span>{{$repuestos->count()}}</span> Repuestos Encontrados</div>
                                <div class="shop_sorting">
                                    <span>Ordenar por:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">Nombre<i class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Nombre</li>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Precio</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        
                            <div class="product_grid">
                                <div class="product_grid_border"></div>
                                
                                @foreach($repuestos as $repuesto)
                                    @if($repuesto->estado_repuesto==1)
                                    <!-- Product Item -->
                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                        @if($repuesto->imagenrepuesto->count()>0)
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="ecommerce/images/productos/{{$repuesto->imagenrepuesto->last()->ruta_imagenrepuesto}}" alt=""></div>
                                        @endif
                                        <div class="product_content">
                                            <div class="product_price number">${{  number_format($repuesto->precio_repuesto,0) }}</div>
                                            <div class="product_name"><div><a href="detallerepuesto/{{$repuesto->id_repuesto}}" tabindex="0">{{$repuesto->nombre_repuesto}}</a></div></div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                    @endif
                                @endforeach
                                
                        
                            </div>
                        
                        
                            <!-- Shop Page Navigation -->
                        
                            <div class="shop_page_nav d-flex flex-row">
                                {{ $repuestos->links() }}

                            </div>
                        
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@stop


@section('script-js')
<script src="/ecommerce/js/shop_custom.js"></script>
<script>
    $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if(results==null){
        return null
    }else{
        return results[1] || 0;
    }
    }

	$(document).ready(function() {
<<<<<<< HEAD

        if(($.urlParam("nombre") !=null)){
             $.ajax({
            url: "/busquedaNombreRepuesto/"+$.urlParam("nombre"),
            type: "GET",
            success: function (datos) {
                $(".shopContent").html(datos);
            }
             });
        }
        else{
            $.ajax({
            url: "/resultadoBusqueda/",
            type: "GET",
            success: function (datos) {
                $(".shopContent").html(datos);
            }
             });
        }
      
=======
>>>>>>> c19513c73cc344c46851ab5059d7b715d8c2c526

    });
    $('#formBusqueda').change(function(e){
        e.preventDefault(e);
            $.ajax({
            type:"GET",
            url:'/generarBusqueda',
            data:$(this).serialize(),
            success: function(data){
                $(".shopContent").empty();

                $(".shopContent").html(data);
            },
            error: function(data){
                console.log(data);

            }
        })
        });

    $('#formBusqueda2').change(function(e){
            e.preventDefault(e);
            $.ajax({
            type:"GET",
            url:'/generarBusquedaMarca',
            data:$(this).serialize(),
            success: function(data){
                $(".shopContent").empty();

                $(".shopContent").html(data);
            },
            error: function(data){
                console.log(data);

            }
        })
    });


    $('#selectMarcas').change(function() {
    $.ajax({
        url: "/selectModelo/"+this.value,
        type: "GET",
        success: function (datos) {
            $('#selectMarcas').siblings('.modelo').remove();
			$('#selectMarcas').siblings('.motor').remove();
            $('#selectMarcas').parent().append(datos)
            }
        });
    });



</script>
@stop

