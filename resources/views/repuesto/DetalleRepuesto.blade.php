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
						<div class="product_text"><p>{{$repuesto->descripcion_repuesto}}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Cantidad: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1" min="0" max="{!! $repuesto->stock_repuesto !!}" >
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

								</div>

								<div class="product_price">Precio: ${{  number_format($repuesto->precio_repuesto) }}</div>
								<div class="button_container">
									<button type="button" class="button cart_button"  data-toggle="modal"  data-target="#exampleModal">Adquirir Repuesto</button>

									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
											  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
											</div>
											<div class="modal-body">
											 <p> ¿Esta seguro que desea Adquirir el siguiente repuesto?</p>
											 <p> Se enviaran los datos del vendedor poder contactarse con el.</p>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
											  <button type="button" class="btn btn-primary" onclick="confirmarComprar()">Adquirir Repuesto</button>
											</div>
										  </div>
										</div>
									</div>
									
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

			<div class="row justify-content-md-center mt-5"></div>
			<div class="row justify-content-md-center mt-5">
				<div class="col-md-5">
					<h4 class="mb-4">Este repuesto es compatible con:</h4> 
					@if($repuesto->compatibilidad->count()>0)
						<div class="col-lg-6">
						<table class="table table-bordered table-hover">
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
					<p>	No posee información sobre compatibilidad.</p>
					@endif
				</div>
				
				<div class="col-md-5">
					<h4 class="mb-4">Información del Vendedor</h4> 

					@if($repuesto->usuario->id_perfil==2)
						<ul class="card-text mt-2">Nombre: {{ $repuesto->usuario->empresa->last()->nombre_empresa }}</ul>
						<ul class="card-text mt-2">Dirección: {{ $repuesto->usuario->empresa->last()->direccion_empresa }}</ul>
						<ul class="card-text mt-2">Pagina Web:<a href="{{ $repuesto->usuario->empresa->last()->web_empresa }}"> {{ $repuesto->usuario->empresa->last()->web_empresa }} </a></ul>
					@else 
						<ul class="card-text mt-2">Nombre: {{ $repuesto->usuario->personanatural->last()->nombres_personanatural }}</ul>
						<ul class="card-text mt-2">Apellido: {{  $repuesto->usuario->personanatural->last()->apellidos_personanatural }}</ul>
					@endif
				</div>

			</div>
		</div>
	</div>
@stop



@section('script-js')
<script src="/ecommerce/js/product_custom.js"></script>

<script>
$('.product_fav').click(function() {
		$.ajax({
			url: "/editarfavorito/{{ $repuesto->id_repuesto }}",
			type: "GET",
			success: function (datos) {
				$("#"+count).html(datos);
			}
			});
	});


function confirmarComprar() {
		stockRepuesto= {!! $repuesto->stock_repuesto !!} ;
		if(stockRepuesto < $("#quantity_input").val() ){
			alert("no existe stock para el repuesto, Cantidad maxima ="+stockRepuesto);
		}
		else{
		window.location.href = '/venta/{{$repuesto->id_repuesto}}+'+$("#quantity_input").val();

		}
}
</script>

@stop