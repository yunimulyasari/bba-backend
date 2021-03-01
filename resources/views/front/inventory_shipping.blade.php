@extends('layout.master')
@section('content')
    <div class="main__container__2">
                                      
          <!-- wrapper -->
          <section class="account__wrapper"> 
                    <div class="payment__step--main">
                          <span class="payment__success">
                              <h2 class="payment__success--h2">PAYMENT CONFIRMATION</h2>
                              <hr class="payment__success--hr">
                              <p class="payment__success--p">
                                Dear {{ $name }},<br><br>
                                Please finish your transaction immediately :
                                <b><br>Transfer to MANDIRI BANK
                                <br>Branch: PT.Xyz
                                <br>A/C: 122.00.0491443.1</b>
                                <br>Transaction will be cancelled if payment is not completed within <b>2x24 hours</b>.
                                </a>
                              </p>
                              <br>
                              <h4 class="payment__success--h4">Your transaction number is #OST202107129809X</h4>
                              <p class="payment__success--p">
                                <span class="payment__success__label">Total payment:</span>{{ '$' . number_format($total, 0, '.', 0) }}<br>
                                <span class="payment__success__label">Name:</span>{{ $name }}<br>
                                <span class="payment__success__label">Phone Number:</span>{{ $phone }}<br>
                                <span class="payment__success__label">Shipping Address:</span>{{ $address }}<br><br>

                                Thank you for shopping at Online Shop. We hope you have enjoyed your shopping with us<br>
                                and hope you will shop with us again.
                              </p><br><br>
                               <a href="{{ url('/product')}}" class="button--order--success">Back to shop</a>
                          </span>
                           
                    </div>        
          </section>
    </div>  
@stop

