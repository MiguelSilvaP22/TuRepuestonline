@extends('ecommerce.layout')
@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css">
@stop
@section('content')
<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
								<div class="sidebar_title">Busqueda repuesto</div>
								<select class="form-control" id="exampleFormControlSelect1">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
								</select>

						</div>
						
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filtros</div>
							<div class="sidebar_subtitle">Precios</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Rango: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
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

                            <button class="btn btn-success btn-submit">Submit</button>

                            </form>
                        </div>
                        {!! Form::close() !!}
					</div>

				</div>

				<div class="col-lg-9">
					       
					<!-- Shop Content -->
                    <div class="shopContent"></div>
				</div>
			</div>
		</div>
	</div>
@stop


@section('script-js')
<script>

	$(document).ready(function() {
        $.ajax({
            url: "/resultadoBusqueda/",
            type: "GET",
            success: function (datos) {
                $(".shopContent").html(datos);
            }
        });

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
</script>
@stop

