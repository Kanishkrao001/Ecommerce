@extends('layouts.app')

@section('content')

            <center>{{ 'MOBILES....' }} 
            <br><br>
            @foreach ($data as $item)
            <div class="items">
             <div class="element">
               <a href="details/{{ $item->product_id }}">
                 <br>
                 <img  class="imag" src="{{ $item->image}}" alt="random">
               </a>
              </div>
                <div class="element">
                  <br>
                  <p>{{ $item->Product_Name}}</p>
                  <br>
                 <p>{{ $item->Product_Description}}</p>
                 <br>
                 <p>{{ $item->price}}</p>
                 <br>
                 {{-- <p><button><a href="{{ url('shopkaro/cart') }}">Add to Cart</a></button></p>  --}}
                 <form action="{{ $item->Product_Name}}/cart" method="post">
                   {{ csrf_field() }}
                   <input type="hidden" name="Product_Name" value="{{ $item->Product_Name }}">
                   <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                   <button class="btn btn-success">Add to Cart</button>
                 </form>
               </div>  
             </div>
             <br><br>
            @endforeach
  
            
@endsection 
                {{-- <div class="con2">
                  <div class="con1_1">
                  <p>Subscribe for Latest Offers</p>
                  <br>
                  <form>
                    <input for="email" type="email" placeholder="Enter Email">
                    <button type="submit" id="email">Subscribe</button>
                  </form>
                </div>
                <br><br>
                <div class="con2_2">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ullam ipsam saepe pariatur est, quos suscipit!</p>
                </div>
                </div>
              </div>

            
        </div>
    </div>
</div> --}}


