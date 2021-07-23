@extends('layouts.app');
    {{-- <div class="row">
        <div class="clm">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>

                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->Product_Name }}</td>
                            <td>{{ $item->Product_Description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
    </div> --}}
@section('content')
    
    <center>{{ 'ALL ITEMS....' }} 
        <br><br>
        @foreach ($pro as $item)
        <div class="items">
         <div class="element">
           <a href="details/{{ $item->product_id }}">
             <br>
             <img  class="imag" src="{{ $item->image}}" alt="random">
           </a>
          </div>
            <div class="element element-1">
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

        {{ $pro->links() }}

        @endsection
