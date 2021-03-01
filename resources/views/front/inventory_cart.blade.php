@extends('layout.master')
@section('content')

<div class="main__container__2">
    <p class="breadscrumbs">
      <a href="{{ route('frontProduct')}}" class="breadscrumbs--a">Home </a> / 
      <a class="breadscrumbs--a breadscrumbs__gray"> Shopping Cart</a></p>
                                
  <!-- product wrapper -->
   <section class="account__wrapper"> 
        <div class="account--main">

              <!-- payment step -->
              <ul class="payment__step--ul">
                    <li class="payment__step--li">
                          <a class="payment__step--a">
                                <h4 class="payment__step--h4--now">Shopping Cart</h4>
                                <span class="icon--payment--now"></span>
                          </a>
                    </li>
                    <li class="payment__step--li">
                          <a class="payment__step--a">
                                <h4 class="payment__step--h4--before">Shipping</h4>
                                <span class="icon--payment--before"></span>
                          </a>
                    </li>
                    <li class="payment__step--li">
                          <a class="payment__step--a">
                                <h4 class="payment__step--h4--before">Payment</h4>
                                <span class="icon--payment--before"></span>
                          </a>
                    </li>
              </ul>

              <div class="shoppingcart__wrapper">
              <h2 class="payment__step--main--h2">SHOPPING CART</h2>
              <h5 align='center' style='color:red;font-weight:bold;'>{{Session::get('msg')}}</h5>
              
              @if(Cart::getContent()->count() == 0 )
                    <!-- jika cart kosong -->
                    <hr class="payment__step--main--hr">
                    <p>Your shopping cart is empty.<br>
                    Please click <a href="{{ route('frontProduct')}}">here</a> to shop.</p>
              
               @else

                <!-- shopping cart -->
              <form method="POST" action="{{ route('frontCheckout') }}" enctype="multipart/form-data" @submit.prevent>
              <div class="shoppingcart__wrapper">
                    <table class="table__detailinformation" id="table__detailinformation">
                          <!-- header -->
                          <tr class="table__detailinformation--header">
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Inventory Qty</th>
                                <th>Total</th>
                                <th></th>
                          </tr>  
                          

                          @foreach($carts as $key => $cart)

                          <!-- body -->
                          <tr class="table__detailinformation--list" id="{{ $cart->id }}">
                                <td>
                                     <ul class="detailinformation__imgname--ul">
                                           <li class="detailinformation__imgname--li">
                                                  <img src="{{ asset('front/images/products/'.$cart->associatedModel['image']) }}" alt="{{ $cart->name }}" title="{{ $cart->name }}" class="detailinformation__imgname--img">
                                    
                                           </li>
                                           <li class="detailinformation__imgname--li">
                                                 <h5 class="detailinformation--h5">{{$cart->name}}</h5>
                                                 <a href="{{ route('frontDetail', $cart->id) }}">
                                                 <h2 class="detailinformation--h2">{{$cart->name}}</h2></a>
                                           </li>
                                     </ul>
                                </td>
                                <td>
                                      <h3  class="detailinformation--h3 detailinformation__textprice">
                                       {{ $cart->associatedModel['code'] }}</h3>
                                      <input name="code[]" type="text" value="{{ $cart->associatedModel['code'] }}" maxlength="2" class="price" style="display:none">

                                </td>
                                <td>
                                      <h3  class="detailinformation--h3 detailinformation__textprice">
                                       {{'$' .number_format($cart->price, 0, ",",".")}}</h3>
                                      <input name="price[]" type="text" value="{{$cart->price}}" maxlength="2" class="price" style="display:none">

                                </td>
                                <td>
                                      <input name="qty[]" type="text" value="{{ $cart->quantity }}" maxlength="2" class="detailinformation--input" disabled>
                                      <input name="quantities[]" type="text" value="{{ $cart->quantity }}" style="display:none">
                                      <input name="rowid[]" id="rowid" type="text" value="{{$cart->id}}" style="display:none">

                                </td>
                                <td>
                                      <h3 name="subt_label[]" class="subPrice">
                                      	<?php
                                      	?>
                                      	@if(!empty($cart['conditions']))
	                                      		@foreach($cart['conditions'] as $cond)
                                              {{ '$' . number_format($cond->getValue(), 0, '.', 0) }}
	                                      		@endforeach
                                      		@elseif(Cart::get(2) !== null)
	                                      		@if(empty(Cart::get(4)->id) AND $cart->associatedModel['code'] == '234234' AND $cart->quantity == 1 AND !empty(Cart::get(2)->quantity == 1))
	                                      			${{ 0 }}
	                                      		@else
                                              {{ '$' . number_format($cart->getPriceWithConditions() * $cart->quantity, 0, '.', 0) }}
	                                      		@endif
	                                      	@else
                                            {{ '$' . number_format($cart->getPriceWithConditions() * $cart->quantity, 0, '.', 0) }}
                                      	@endif
                                      </h3>
                                       <input name="subt[]" class='subT' type="text" value="{{ Cart::getTotalQuantity() }}" style="display:none">
                                </td>
                                <td>
                                   <!--  <a href="javascript:void(0);" data-id="{{ $cart->id }}" class="mp-del-cart" data-url="{{ route('frontDeleteCart') }}"><span class="icon--payment--delete"></span></a>
 -->
                                <form action="{{ route('frontDeleteCart') }}" method="POST" enctype="multipart/form-data" @submit.prevent>
                            		{{ csrf_field() }}
                            		  <input type="hidden" value="{{ $cart->id }}" name="id" data-id="{{ $cart->id }}">
                                  <button type="submit" name="submit" value="x" class="btn--del-cart"><span class="icon--payment--delete"></span></button>
                            	   </form>

                                </td>
                          </tr>


                          @endforeach
                       
                          <!-- total -->
                          <tr class="table__detailinformation--total">
                                <td>
                                </td>
                                <td>
                                      <h3 class="detailinformation__imgname--h3 detailinformation__texttotal">TOTAL ORDER</h3>
                                <td>
                                </td>
                                <td>
                                      <h3 id="totalcart" class="detailinformation__imgname--h3 detailinformation__price">{{ '$' . number_format($total, 0, '.', 0) }}</h3>
                                       <input name="grandTotal" id="grandtotal" value='{{Cart::getTotal()}}' type="text" style="display:none">
                                </td>
                                <td>
                                </td>
                          </tr>                                                    
                    </table>

                    <br>
                    <article class="giftnote__box">
                          <b><p>Shipping details</p></b>
                          <div class="shipping__option__container" id="option__shipping__container1">

                                                  <!-- Name -->
                                                  <div class="form__content--divwrapper form__content--divwrapper--shipping">
                                                        <label for="" class="form__content--label"><b>Name</b></label>
                                                          <input name="fullName" type="text" placeholder="Input full name" maxlength="100">
                                                  </div> 
                                                  <!-- Phone -->
                                                  <div class="form__content--divwrapper form__content--divwrapper--shipping">
                                                        <label for="" class="form__content--label"><b>Phone Number</b></label>
                                                          <input name="phone" type="text" placeholder ="Input phone number" maxlength="20">
                                                  </div>    
                                                <!-- Address -->
                                                  <div class="form__content--divwrapper form__content--divwrapper--shipping">
                                                        <label for="" class="form__content--label"><b>Shipping Address</b></label>
                                                        <textarea class="form__content--textarea"   name="address" id="" rows="4"></textarea>
                                                         @if ($errors->has('address')) <span class="form__content--info info--failed">*{{ $errors->first('address') }}</span><br> @endif
                                                        
                                                  </div>
                        </article>
                        <hr class="payment__step--main--hr">
                        <b><p>Promotions</p></b>
                          <small class="shipping__cost--price--small">
                            * Each sale of a MacBook Pro comes with a free Raspberry Pi B<br>
                            * Buy 3 Google Homes for the price of 2<br>
                            * Buying more than 3 Alexa Speakers will have a 10% discount on all Alexa speakers
                            </small>
                        <br>
                  
                        <span class="payment__button__box">
                          <a class="payment__button__box--atext" href="{{ route('frontProduct')}}">Continue Shopping</a>
                          {{ csrf_field() }}
                          <input type="submit" class="button--account" name="submit" value="CHECK OUT" />
                        </span>
                </form>
                @endif
            </div>
        </div>
    </section>
</div>
@stop
