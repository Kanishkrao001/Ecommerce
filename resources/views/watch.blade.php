@extends('layouts.app')


@section('content')

            <center><h1>WATCHES</h1>
            <br><br>
            <div class="overall">
              <div class="left">
                <h2>left side</h2>
              </div>
      
              <div class="all">
              @foreach ($data as $item)
              
              <div class="items">
               <div class="element">
                 <a href="details/{{ $item->product_id }}">
                   <br>
                   <img  class="imag" src="{{ $item->image}}" alt="random">
                 </a>
                </div>
                <div class="element element-1">
                  <br>
                  <h4>Product Name</h4>
                  <p>{{ $item->Product_Name}}</p>
                  <h4>Description</h4>
                 <p>{{ $item->Product_Description}}</p>
                 <h4>Price</h4>
                 <p>{{ $item->price}}</p>
                 <br>
                   {{-- <p><button><a href="{{ url('shopkaro/cart') }}">Add to Cart</a></button></p>  --}}
                   {{-- <form action="{{ $item->Product_Name}}/cart" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="Product_Name" value="{{ $item->Product_Name }}">
                     <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                     <button class="btn btn-success gap">Add to Cart</button>
                   </form> --}}
                   <button  class="btn btn-success" id="btn" onclick="additem({{ $item->product_id }})">Add To Cart</button>
                 </div>  
               </div>
            
              @endforeach
              {{ $data->links() }}
            </div>
      
            <div class="right">
                <h3>right side</h3>
            </div>
      
        </div>

        <script>
          function additem(id)
          {
            // var token = $(this).data("token");
            if(confirm("Add karna hai??"))
            {
              $.ajax({
                url: '/' +id+'/cart',
                type: "POST",
                data: {
                  "product_id": id,
                  "_token":"{{ csrf_token() }}",
                },
                success: function()
                {
                  // $('#row'+id).remove();
                  console.log("chal gaya");
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