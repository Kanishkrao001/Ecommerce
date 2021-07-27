@extends('layouts.app')

@section('content')

@foreach ($data as $item)
    @php ( $sum = 0 )
@endforeach
<br>

  <div class="upper">

     <div class="head">
      <p> Your Cart Details </p>
    </div>
    @if(count($data)<=0)
    {{-- <div class="con"> --}}
      <p>Empty Cart........</p>
      <p>Order Something...</p>
    @else
    <br>
    <div class="block">
       @foreach ($data as $item)
        
          <div class="details1">
            <div class="det-first">
              <img class="imagg-1" src="{{ $item->image }}" alt="img">
            </div>
            <div class="det-first1">
              <p>{{ $item->Product_Name }}</p>
            </div>
            <div class="det-first1">
              <p>{{ $item->price }}</p>
            </div>
          </div>
          @php ($sum = $sum + $item->price);
      
       @endforeach
      </div>
  </div>

  <div class="checkout">
    <div class="details h">
       <h3>Order Total..!!!</h3>
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