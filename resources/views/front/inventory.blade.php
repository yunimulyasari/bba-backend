@extends('layout.master')
@section('content')

<center>
    <img class="molt banner--article"
    data-molt-600w="{{ URL::asset('front/images/img__banner__page/banner--products--1360.jpg') }}" 
    data-molt-1400w="{{ URL::asset('front/images/img__banner__page/banner--products--1920.jpg') }}" alt="">
</center>
    <div class="main__container__3 main__container__full">
      <p class="breadscrumbs"><a href="{{URL::to('/')}}" class="breadscrumbs--a">Home </a> / <a class="breadscrumbs--a"> Products</a></p>

        <!-- Sidebar Left -->
        @include('layout.product.sidebar_left')
    
        <!-- product wrapper -->
        <section class="product__wrapper">
          <ul class="product--ul" id="filter">
              <!-- list product -->
              @if(isset($products))
                   @foreach($products as $product)
                    <li class="product--li">
                      <a href="{{ route('frontDetail', $product->id) }}" class="product--a">
                        <img src="{{ asset('front/images/products/'.$product->image) }}" alt="{{ $product->name }}" title="{{ $product->name }}"> </a>
                          <h3 class="product--title">{{$product->name}}</h3>
                          @if($product->price == 0)
                          <h4 class="product--price">Price upon request</h4>
                          @elseif ($product->price !== 0)
                          <h4 class="product--price">{{ '$' . number_format($product->price, 0, '.', 0) }}</h4>
                          
                          @endif
                        
                    </li>
                @endforeach
               @endif 
          </ul>

        <div>

    </section>
    
</div>

<script>

    //When DOM loaded we attach click event to button
    $(document).ready(function() {
        
        //attach keypress to input
        $('.qtyvalue').keydown(function(event) {
            // Allow special chars + arrows 
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                || event.keyCode == 27 || event.keyCode == 13 
                || (event.keyCode == 65 && event.ctrlKey === true) 
                || (event.keyCode >= 35 && event.keyCode <= 39)){
                    return;
            }else {
                // If it's not a number stop the keypress
                if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault(); 
                }   
            }
        });
     

     

     $("#product_detail_add_to_cart").click(function()
     {
        $("#popup__product_detail").removeClass("popup--hide");
            $("#popup__product_detail").addClass("popup--show");
     });

     $("#popup_product_detail_cancel").click(function()
        {
            $("#popup__product_detail").removeClass("popup--show");
            $("#popup__product_detail").addClass("popup--hide");
             
        });

     $("#popup_product_detail_next").click(function()
    {
        $("#product_detail_add_to_cart_submit").click();
       
    });

    });


</script>

@stop