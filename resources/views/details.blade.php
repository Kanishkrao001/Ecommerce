@extends('layouts.app');

@section('content')
    <div class="desc">
        <div class="row"><a href="" style="text-decoration: none">
          <img  class="imag" src="{{ $data['image']}}" alt="random">
          <br>
            <h2>{{$data['Product_Name']}}</h2>
            <br>
            <h3>Price: {{$data['price']}}</h3>
            <br>
            <h4>Details: {{$data['Product_Description']}}</h4>
            </a>
        </div>
            <br> <br>
        <div class="row clm2">
            <form action="/{{ $data['product_id'] }}/cart" method="post">
              {{ @csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $data['product_id'] }}">
              <button class="btn btn-success">Add to Cart</button>
            </form>
            <br> <br>
            <button class="btn btn-info">Buy Now..!!!</button>
        </div>
        <div class="con2">
            <div class="con2_1">
            <p>Subscribe for Latest Offers</p>
            <br>
            <form>
              <input for="email" type="email" placeholder="Enter Email">
              <button type="submit" id="email">Subscribe</button>
            </form>
          </div>
          <div class="con2_2">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ullam ipsam saepe pariatur est, quos suscipit!</p>
          </div>
          </div>
    </div>
@endsection
