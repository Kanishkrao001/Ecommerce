@extends('layouts/app')

@section('content')
@php ( $sum = 0 )
{{-- <br>
<div class="heading">
    <center><h3>Your order summary for order_id {{$all[0]->order_id}}</h3></center>
</div>
<br> --}}
<div class="summary">
  <center><h2>Your order summary for order_id {{$all[0]->order_id}}</h2>
    <br><br>
</div>
  <div class="all-1">
    <div class="left">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, est.</p>
    </div>
    <div class="wrap">
        @foreach ($all as $item)
        <div class="details1">
            <div class="det-first">
              <img class="imagg-1" src="{{ $item->image }}" alt="img">
            </div>
            <div class="det-first1">
              <p>{{ $item->Product_Name}}</p>
            </div>
            <div class="det-first1">
              <p>{{ $item->price}}</p>
            </div>
        </div>
        @php ($sum = $sum + $item->price);
        @endforeach
        <div class="details1">
            <div class="det-first">
                <p>Your Total</p>
              </div>
            <div class="det-first">
              <p>{{ 1.05*$sum }}</p>
            </div>
        </div>
    </div>
    <div class="right">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, cumque? </p>
    </div>

</div>
<br>
<center><a href="http://127.0.0.1:8000/{{ $all[0]->customer_id }}/cart_history">BACK</a>
@endsection