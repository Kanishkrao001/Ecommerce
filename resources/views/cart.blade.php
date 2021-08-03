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
        
          <div class="details1" id="row{{$item->id}}">
            <div class="det-first">
              <img class="imagg-1" src="{{ $item->image }}" alt="img">
            </div>
            <div class="det-first1">
              <p>{{ $item->Product_Name }}</p>
            </div>
            <div class="det-first1">
              <p>{{ $item->price }}</p>
            </div>
        
          <div class="det-first1">
            {{-- <form class="lower" action="/{{ $item->id}}/cart/remove" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $item->product_id }}">
              <input type="hidden" name="customer_id" value="{{ $item->customer_id }}">
              {{-- <button class="btn btn-danger lower">Remove</button> --}}
              {{-- <button id="btn" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}">sample</button> 
            </form> <br> --}}
            {{-- <button id="btn" data-id="{{ $item->id }}" data-token="{{ csrf_token() }}">sample</button> --}}
            <button id="btn" onclick="itemdelete({{$item->id}}, {{$item->price}})">sample</button>
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
      <center><button type="submit" class="btn btn-success lower">Buy Now</button>
    </form>
  </div>

  @endif

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $("#btn").click(function(){
          if(confirm("Do you really want to deelete")){
          var id = $(this).data("id");
          var token = $(this).data("token");
          $.ajax(
            {
              // url: '{{ url('/cart/remove') }}',
              url: '/cart/remove',
              type: "DELETE",
              data: {
                "id": id,
                "_token": token,
              },
              success: function(response) {
                // return data;
               
                console.log("chal gaya");
                // $('.block').html(data);
             },
             error: function() {
               console.log("error");
             }
          });
          }
        });
    });
    </script> --}}

  <script>
    function itemdelete(id, price)
    {
      // var token = $(this).data("token");
      if(confirm("Delete karna hai??"))
      {
        $.ajax({
          url: '/cart/remove',
          type: "DELETE",
          data: {
            "id": id,
            "price":price,
            "_token":"{{ csrf_token() }}",
          },
          success: function(data)
          {
            $('#row'+id).remove();
            // console.log("chal gaya");
            location.reload();
            // console.log(data);
          },
          error: function()
          {
            console.log("nahi chala");
          }
      })
      }
    }
</script>

@endsection