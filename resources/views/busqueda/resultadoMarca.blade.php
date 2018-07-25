<div class="shop_content">
    <div class="shop_bar clearfix">
        <div class="shop_product_count"><span>{{$repuestos->count()}}</span> Repuestos Encontrados</div>
        <div class="shop_sorting">
           
        </div>
    </div>

    <div class="product_grid">
        <div class="product_grid_border"></div>
        
        @foreach($repuestos as $repuesto)
        @if($repuesto->estado_repuesto==1)
        <!-- Product Item -->
        <div class="product_item is_new">
            <div class="product_border"></div>
            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="ecommerce/images/productos/{{$repuesto->ruta_imagenrepuesto}}" alt=""></div>
            <div class="product_content">
                <div class="product_price number">${{  number_format($repuesto->precio_repuesto,0) }}</div>
                <div class="product_name"><div><a href="detallerepuesto/{{$repuesto->id_repuesto}}" tabindex="0">{{$repuesto->nombre_repuesto}}</a></div></div>
            </div>
        </div>
        @endif()
        @endforeach
        

    </div>

    <!-- Shop Page Navigation -->

    <div class="shop_page_nav d-flex flex-row">
            {{ $repuestos->links() }}
    
    </div>

</div>

<script src="/ecommerce/js/shop_custom.js"></script>
