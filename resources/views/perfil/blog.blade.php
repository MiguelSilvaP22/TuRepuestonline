@extends('ecommerce.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/blog_responsive.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/ecommerce/styles/contact_responsive.css">
@stop

@section('content')

	<!-- Home -->

	<div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="/ecommerce/images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $empresa->nombre_empresa }}</h2>
             <h5><a href="{{ $empresa->web_empresa }}">{{ $empresa->web_empresa }}</a></h5>
        </div>
    </div>

    
    
        <!-- Blog -->
    
        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                            
                            <!-- Contact Info -->

                        <div class="contact_info mb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                                            <!-- Contact Item -->
                                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                                <div class="contact_info_image"><img src="/ecommerce/images/contact_1.png" alt=""></div>
                                                <div class="contact_info_content">
                                                    <div class="contact_info_title">Telefono</div>
                                                    <div class="contact_info_text">{{ $empresa->fono_empresa }}</div>
                                                </div>
                                            </div>

                                            <!-- Contact Item -->
                                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                                <div class="contact_info_image"><img src="/ecommerce/images/contact_2.png" alt=""></div>
                                                <div class="contact_info_content">
                                                    <div class="contact_info_title">Correo Electronico</div>
                                                    <div class="contact_info_text">{{ $empresa->usuario->email }}</div>
                                                </div>
                                            </div>

                                            <!-- Contact Item -->
                                            <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                                                <div class="contact_info_image"><img src="/ecommerce/images/contact_3.png" alt=""></div>
                                                <div class="contact_info_content">
                                                    <div class="contact_info_title">Dirección</div>
                                                    <div class="contact_info_text">{{ $empresa->direccion_empresa }}</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    
                            <!-- Blog post -->

                            @foreach($empresa->usuario->repuestos as $repuesto)
                                <div class="card" style="width: 22rem;">
                                    <img class="card-img-top" src="/ecommerce/images/productos/{{ $repuesto->imagenrepuesto->last()->ruta_imagenrepuesto }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $repuesto->nombre_repuesto }}   <p>${{  number_format($repuesto->precio_repuesto) }}</p></h5>
                                      <p class="card-text">{{ $repuesto->descripcion_repuesto }}</p>
                                      <a href="/detallerepuesto/{{ $repuesto->id_repuesto }}" class="btn btn-primary">ver repuesto</a>
                                    </div>
                                </div>
                              

                            @endforeach
                            
    
                            
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>>

@stop 

@section('script-js')
<script src="/ecommerce/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/ecommerce/js/blog_custom.js"></script>


@stop
