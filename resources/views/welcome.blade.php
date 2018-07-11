@extends('ecommerce.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/responsive.css">
@section('content')

	<!-- Characteristics -->

	<!-- <div class="characteristics">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Productos Destacados</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
                                <!-- Deals Item -->
                                
								@foreach($repuestosSuper as $repuesto)
									@if($repuesto->estado_repuesto == 1)
										<div class="owl-item deals_item">
											<div class="deals_image"><img src="/ecommerce/images/productos/{{ $repuesto->ruta_imagenrepuesto }}" alt=""></div>
											<div class="deals_content">
												<div class="deals_info_line d-flex flex-row justify-content-start">
													<div class="deals_item_category"><a href="#">{{ $repuesto->nombre_categoriarepuesto }}</a></div>
												</div>
												<div class="deals_info_line d-flex flex-row justify-content-start">
													<div class="deals_item_name"><a href="repuesto/{{ $repuesto->id_repuesto }}">{{ $repuesto->nombre_repuesto }}</a></div>
													<div class="deals_item_price ml-auto">${{  number_format($repuesto->precio_repuesto) }}</div>
												</div>
											</div>
										</div>
									@endif
                                @endforeach

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Top Repuestos</li>
									<li>Nuevos</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

                                   @foreach($repuestosOro as $repuesto)    
										@if($repuesto->estado_repuesto == 1)
											<!-- Slider Item -->
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/ecommerce/images/productos/{{ $repuesto->ruta_imagenrepuesto }}" alt=""></div>
													<div class="product_content">
														<div class="product_price">${{  number_format($repuesto->precio_repuesto) }}</div>
														<div class="product_name"><div><a href="detallerepuesto/{{$repuesto->id_repuesto}}">{{ $repuesto->nombre_repuesto }}</a></div></div>
														<div class="product_extras">
															<button class="product_cart_button active" onclick="location.href='detallerepuesto/{{$repuesto->id_repuesto}}';">Ver Repuesto</button>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount"></li>
													</ul>
												</div>
											</div>
										@endif
                                    @endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

                                    @foreach($repuestosNuevos as $repuesto)    
										@if($repuesto->estado_repuesto == 1)
										<!-- Slider Item -->
										<div class="featured_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/ecommerce/images/productos/{{ $repuesto->ruta_imagenrepuesto }}" alt=""></div>
												<div class="product_content">
													<div class="product_price">${{  number_format($repuesto->precio_repuesto) }}</div>
													<div class="product_name"><div><a href="product.html">{{ $repuesto->nombre_repuesto }}</a></div></div>
													<div class="product_extras">
														<button class="product_cart_button active" onclick="location.href='detallerepuesto/{{$repuesto->id_repuesto}}';">Ver información</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
												</ul>
											</div>
										</div>
										@endif

                                @endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@stop


@section('script-js')

<script src="/ecommerce/plugins/greensock/animation.gsap.min.js"></script>
<script src="/ecommerce/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/ecommerce/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/ecommerce/plugins/slick-1.8.0/slick.js"></script>
<script src="/ecommerce/plugins/easing/easing.js"></script>
<script src="/ecommerce/js/custom.js"></script>

@stop

