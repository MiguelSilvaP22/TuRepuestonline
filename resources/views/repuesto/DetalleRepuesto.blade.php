@extends('ecommerce.layout')

@section('css')

<link rel="stylesheet" type="text/css" href="/ecommerce/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/product_responsive.css">
@stop

@section('content')

  <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
            @foreach($repuesto->imagenrepuesto as $imagen)
						<li data-image="/ecommerce/images/productos/{{$imagen->ruta_imagenrepuesto}}"><img src="/ecommerce/images/productos/{{$imagen->ruta_imagenrepuesto}}" alt=""></li>
            @endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="/ecommerce/images/productos/{{$repuesto->imagenrepuesto->last()->ruta_imagenrepuesto}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$repuesto->categoriaRepuesto->nombre_categoriarepuesto}}</div>
						<div class="product_name">{{$repuesto->nombre_repuesto}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{{$repuesto->descripcion_repuesto}}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Cantidad: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

								</div>

								<div class="product_price">Precio: ${{$repuesto->precio_repuesto}}</div>
								<div class="button_container">
									<button type="button" class="button cart_button" onclick="confirmarComprar()">Adquirir Repuesto</button>
									@if($favorito==null)
										<div class="product_fav "><i class="fas fa-heart "></i></div>
									@else
										@if($favorito->estado_favorito==1)
										<div class="product_fav active"><i class="fas fa-heart active"></i></div>
										@else
										<div class="product_fav "><i class="fas fa-heart "></i></div>
										@endif
									@endif

								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>

			<div class="row justify-content-md-center mt-5"><h4>Compatibilidad de repuesto</h4> </div>
			<div class="row justify-content-md-center mt-5">
				
				@if($repuesto->compatibilidad->count()>0)
					<div class="col-lg-6">
					<table class="table">
							<thead>
								<tr>
								<th scope="col">#</th>
								<th scope="col">Modelo</th>
								<th scope="col">Marca</th>

								</tr>
					</thead>
						<tbody>

						@foreach($repuesto->compatibilidad as $key => $modelo)
				
							<tr >
							<td >{{$key}}</td>
							<td>{{$modelo->nombre_modelo}}</td>

								<td>{{$modelo->marca->nombre_marca}}</td>
							<tr>
						@endforeach
						</tbody>
					</table>

					</div>
				@else
				<p>				No posee información sobre compatibilidad.</p>
				@endif	
			</div>
		</div>
	</div>
@stop



@section('script-js')
<script>
$('.product_fav').click(function() {
		$.ajax({
			url: "/editarfavorito/{{$repuesto->id_repuesto}}",
			type: "GET",
			success: function (datos) {
				$("#"+count).html(datos);
			}
			});
	});


function confirmarComprar() {
var r = confirm("¿Esta Seguro Que desea adquirir este producto?");
	if (r == true) {
		window.location.href = '/venta/{{$repuesto->id_repuesto}}';
	} else {
	}
}
</script>

@stop