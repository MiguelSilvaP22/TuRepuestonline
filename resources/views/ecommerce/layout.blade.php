<!DOCTYPE html>
<html lang="en">
<head>
<title>MIGUI BELLOX</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/bootstrap4/bootstrap.min.css">
<link href="/ecommerce/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ecommerce/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>

@yield('css')

<style>
	.main_nav_menu{
		margin-right: 5%;
	}
</style>

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
								
								
								@guest
                                <div><a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a> </div>
								<div><a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></div>
								
                        		@else

								<ul class="standard_dropdown main_nav_dropdown">
									<li class="hassubs">

										<a href="#">	{{ Auth::user()->email }}<i class="fas fa-chevron-down"></i></a>
										
										<ul>
										 <li><a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form></li>
											<li><a href="/perfil">Mi Perfil<i class="fas fa-chevron-down"></i></a></li>
											@if(Auth::user()->id_perfil ==3)
												<li><a href="/admin">Administración<i class="fas fa-chevron-down"></i></a></li>
											@endif

										</ul>
										

										
									</li>
									
								</ul>
                       			 @endguest
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row mb-5 mt-3">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1 ">
						<div class="logo_container">
							<div class="logo">
								<a href="/"><img src="\ecommerce\images\logo3.png" ></a>
							</div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Busca tu Producto...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">Todas las Categorías</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="/ecommerce/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							
							<!-- Agregar Producto -->

							@guest
							@else
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon">
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="/crearRepuesto">Agregar Producto</a></div>
									
								</div>
							</div>
							
							
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="/ecommerce/images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="/favoritos">Favoritos</a></div>
									<div class="wishlist_count">{{Auth::user()->favoritos->where('estado_favorito', '1')->count()}}</div>
								</div>
							</div>
							@endguest

							


							<!-- Cart -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categorías</div>
								</div>

								<ul class="cat_menu">
									
										<ul>
											<li class="hassubs">
												<a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li><a href="#">Automóviles<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Motocicletas<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Bicicletas<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Camionetas & Vans<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="#">Accesorios<i class="fas fa-chevron-right"></i></a></li>
								
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="/">Inicio<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">Súper Ofertas<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									
									
									<li><a href="/busqueda">Busqueda<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="contact.html">Contacto<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item">
									<a href="#">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="/ecommerce/images/phone_white.png" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="/ecommerce/images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	
	<!-- Home -->


	<!-- Shop -->

     @yield('content')


	<!-- Recently Viewed -->


	<!-- Footer -->

	<footer class="footer mt-5">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><img src="\ecommerce\images\logo.png"></div>
							<a></a>
						
						</div>
						
						<div class="footer_phone">+56 9 5678 6578</div>
						<div class="footer_contact_text">
							<p>Calle Falsa 666</p>
							<p>Santiago, CL</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="https://www.facebook.com/profile.php?id=100026384449691"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-1">
					<div class="footer_column" >
						<div class="footer_title">Encuentra tu Repuesto</div>
						<ul class="footer_list">
							<li><a href="#">Automóviles</a></li>
							<li><a href="#">Motocicletas</a></li>
							<li><a href="#">Bicicletas</a></li>
							<li><a href="#">Camionetas & Vans</a></li>
							<li><a href="#">Accesorios </a></li>
						</ul>
						
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Servicio al Cliente</div>
						<ul class="footer_list">
							<li><a href="#">Mi Cuenta</a></li>
							<li><a href="#">Mis Compras</a></li>
							<li><a href="#">Favoritos</a></li>
							
							<li><a href="#">FAQs</a></li>
							
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script src="/ecommerce/js/jquery-3.3.1.min.js"></script>
<script src="/ecommerce/styles/bootstrap4/popper.js"></script>
<script src="/ecommerce/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/ecommerce/plugins/greensock/TweenMax.min.js"></script>
<script src="/ecommerce/plugins/greensock/TimelineMax.min.js"></script>
<script src="/ecommerce/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/ecommerce/plugins/greensock/animation.gsap.min.js"></script>
<script src="/ecommerce/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/ecommerce/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/ecommerce/plugins/easing/easing.js"></script>
<script src="/ecommerce/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/ecommerce/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="/ecommerce/plugins/parallax-js-master/parallax.min.js"></script>
{{--<script src="/ecommerce/js/shop_custom.js"></script>
<script src="/ecommerce/js/product_custom.js"></script>--}}

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
@yield('script-js')

</body>

</html>