@extends('layouts.app')

@section('content')

@foreach ($data as $item)
    @php ( $sum = 0 )
@endforeach
<br>

  <div class="upper">

    <div class="head">
      <center><h4>Your Cart Details</h4></center>
    </div>
    @if(count($data)<=0)
    <div class="con">
      <p>Empty Cart........</p>
      <p>Order Something...</p>
    @else
       @foreach ($data as $item)
       <div class="con">
        <div class="before">
          <img class="imagg" src="{{ $item->image }}" alt="img">
        </div>
        <div class="first">
          <p>{{ $item->Product_Name }}</p>
        </div>
        <div class="second">
          <p>{{ $item->price }}</p>
        </div>
  
        <div class="third">
          <form class="lower" action="/{{ $item->id }}/cart/remove" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
            <input type="hidden" name="customer_id" value="{{ $item->customer_id }}">
            <button class="btn btn-danger lower">Remove</button>
          </form>
        </div>
        @php ($sum = $sum + $item->price)
      </div>
      <br>
      @endforeach

     {{-- <a  href="/{{ Auth::user()->id }}/buy" class="anch">Buy Now</a> --}}
  </div>

  <div class="checkout">
    <div class="details h">
       <h3>Order Summary..!!!</h3>
    </div>

    <div class="details">
      <div class="det-first">
        <h4>Total Cost of products.</h4>
      </div>
      <div class="det-first">
        <h4>{{ $sum }}</h4>
      </div>
    </div>
    <div class="details">
      <div class="det-first">
        <h4>Tax</h4>
      </div>
      <div class="det-first">
        <h4> 5% </h4>
      </div>
    </div>
    <div class="details">
      <div class="det-first">
        <h4>Net_Total</h4>
      </div>
      <div class="det-first">
        <h4>{{ 1.05*$sum }} </h4>
      </div>
    </div>
    {{-- <div class="details">
      <a href="/{{ Auth::user()->id }}/buy" class="anch"><button class="btn1">Buy Now</button></a>
    </div> --}}
    <form class="lower" action="/{{ Auth::user()->id }}/buy" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="data" value="{{ $data }}">
      <button type="submit" class="btn btn-danger lower">Buy Now</button>
    </form>
  </div>
  @endif

@endsection