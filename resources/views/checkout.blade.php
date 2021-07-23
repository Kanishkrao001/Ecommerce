@extends('layouts.app');

@section('content')

    <div class="order-summary">
        <h3>Order Summary.....</h3>
    </div>
    
    
    <h3>Please select Your address </h3>
    {{-- <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          {{ $data->Address_1 }}
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            {{ $data->Address_2 }}
        </label>
      </div> --}}
 
      
      <div class="payment">

        <h3>Please select Your mode of Payment </h3>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Card
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
            <label class="form-check-label" for="flexRadioDefault2">
               Cash on Delivery
            </label>
          </div>

          <div class="details">
            <a href="/{{ Auth::user()->id }}/buy/payment" class="anch"><button class="btn1">Pay Now</button></a>
          </div>

     </div>

@endsection