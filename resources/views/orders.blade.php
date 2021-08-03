@extends('layouts/app')

@section('content')

  <div class="summary">
      <center><h2>Your's Cart History...!!!!</h2>
        <br>
  </div>
  <div class="all-1">
    <div class="left">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, est.</p>
    </div>
    <div class="wrap">
      <div class="details1">
          <div class="det-first1">
            <p>Order Id</p>
          </div>
          <div class="det-first1">
            <p>Address Selected</p>
          </div>
          <div class="det-first1">
            <p> Mode of Payment</p>
          </div>
          <div class="det-first1">
            <p>Total Bill</p>
          </div>
          <div class="det-first1">
            <p>Order Details</p>
          </div>
      </div>
      <br>
      @foreach ($orders as $item)
      <div class="details1">
        {{-- <div class="det-first">
          <img class="imagg-1" src="{{ $item->id }}" alt="img">
        </div> --}}
        <div class="det-first1">
          <p>{{ $item->id}}</p>
        </div>
        <div class="det-first1">
          <p>{{ $item->address}}</p>
        </div>
        <div class="det-first1">
          <p>{{ $item->mode_of_payment }}</p>
        </div>
        <div class="det-first1">
          <p>{{ $item->total}}</p>
        </div>
        <div class="det-first1">
          {{-- <form method="post" action="/{{ $item->id}}/history">
            <input type='hidden' value="{{ $item->id }}">
            <button class="btn btn-light" type="submit">Click to know about the Order</button>
          </form> --}}
          <a href="/{{ $item->id}}/history">Click to know about the Order</a>
        </div>
      </div>
      @endforeach
    </div>
  <div class="right">
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, cumque? </p>
  </div>

</div>
    
@endsection