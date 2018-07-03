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
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_1.jpg)"></div>
                                <div class="blog_text">Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada.</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_2.jpg)"></div>
                                <div class="blog_text">Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper massa.</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_3.jpg)"></div>
                                <div class="blog_text">Fusce tincidunt nulla magna, ac euismod quam viverra id. Fusce eget metus feugiat</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
                                <div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_5.jpg)"></div>
                                <div class="blog_text">Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_6.jpg)"></div>
                                <div class="blog_text">In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer tempus nisi</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_7.jpg)"></div>
                                <div class="blog_text">Make Life Easier on Yourself by Accepting “Good Enough.” Don’t Pursue Perfection.</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_8.jpg)"></div>
                                <div class="blog_text">13 Reasons You Are Failing At Life And Becoming A Bum</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
    
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_9.jpg)"></div>
                                <div class="blog_text">4 Steps to Getting Anything You Want In Life</div>
                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
                            
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
