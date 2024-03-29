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
                                <div class="sidebar_title">Búsqueda repuesto</div>
                                {!! Form::select('id_marca', $marcas,null ,['class' => 'form-control mt-3','placeholder'=>'Seleccione una Marca de Vehículo','id'=>'selectMarcas', 'style'=>'width:100%']) !!}         
                            </form>
						</div>

                        <form id="formBusqueda">
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Categorías</div>
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
                                <div class="shop_product_count"><span>{{$repuestos->count()}}</span> Repuestos</div>
                                <div class="shop_sorting">
                                    
                                </div>
                            </div>
                        
                            <div class="product_grid">
                            
                        
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

        if(($.urlParam("nombre") !=null)){
             $.ajax({
            url: "/busquedaNombreRepuesto/"+$.urlParam("nombre"),
            type: "GET",
            success: function (datos) {
                $(".shopContent").empty();
                $(".shopContent").html(datos);
            }
             });
        }
        else if(($.urlParam("categoria") !=null)){
             $.ajax({
            url: "/busquedaCategoriaRepuesto/"+$.urlParam("categoria"),
            type: "GET",
            success: function (datos) {
                $(".shopContent").empty();
                $(".shopContent").html(datos);
            }
             });
        }
        else{

             $.ajax({
            url: "/resultadoBusqueda/",
            type: "GET",
            success: function (datos) {
                $(".shopContent").empty();
                $(".shopContent").html(datos);
            }
        });

        }
      
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


  ////////// PAGINATION //////////////

    $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = this.pathname+"?page="+$(this).attr('href').split('page=')[1];
            getProducts(page);
        });

    function getProducts(page){
        $.ajax({
            url: page,
            type: "GET",
            success: function (datos) {
                $(".shopContent").empty();
                $(".shopContent").html(datos);
            }
             });
    }

</script>
@stop

