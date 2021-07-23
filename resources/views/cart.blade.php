@extends('layouts.app')

@section('content')
@foreach ($data as $item)
    @php ( $sum = 0 )

       {{-- {{ errors }} --}}
       {{-- when the cart is empty --}}
@endforeach
<br>

{{-- <div class="name">
    <center style="color: black; font-weight:bold; font-size:20px"><p>Here is Your Total.....</p>
</div>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Item Name</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->Product_Name }}</td>
            <td>{{ $item->price }}</td>
            @php ($sum = $sum + $item->price)
          </tr>
        @endforeach
        <tr>
            <td>TOTAL</td>
            <td> {{$sum}} </td>
        </tr>
    </tbody>
  </table> --}}

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
          <form class="lower" action="/{{ $item->id}}/cart/remove" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
            <input type="hidden" name="customer_id" value="{{ $item->customer_id }}">
            <button class="btn btn-danger lower">Remove</button>
          </form>
        </div>
        @php ($sum = $sum + $item->price)
      </div>
      @endforeach
           <br>
          <div class="con">
            <div class="first">
              <p> Total Bill </p>
            </div>
            <div class="second">
              <p>{{ $sum }}</p>
            </div>
      @endif
  </div>
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
        <h4>Price1.</h4>
      </div>
    </div>
    <div class="details">
      <div class="det-first">
        <h4>Total .</h4>
      </div>
      <div class="det-first">
        <h4>Price12.</h4>
      </div>
    </div>
    <div class="details">
      <div class="det-first">
        <h4>Total</h4>
      </div>
      <div class="det-first">
        <h4>Price3.</h4>
      </div>
    </div>
    <div class="details">
      <a href="/{{ Auth::user()->id }}/buy" class="anch"><button class="btn1">Buy Now</button></a>
    </div>
  </div>

@endsection