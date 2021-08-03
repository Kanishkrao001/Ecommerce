@extends('layouts.app');

@section('content')
<br>

{{-- {{ $pro[0]['Product_Name'] }} --}}

     <div class="order-summary">
        <h3>Order Summary.....</h3>
        <br>
        @foreach ($pro as $item)
        <div class="order">
          <div class="before">
            <img class="imagg" src="{{ $item->image }}" alt="img">
          </div>  
           <div class="first">
            <p>{{ $item->Product_Name }}</p>
          </div>
          <div class="second">
            <p>{{ $item->price }}</p>
          </div>
        </div>
          @endforeach
    </div> 

    <br><br>

    {{-- {{ $data[0]->Address_1 }} --}}
    <form action="/{{ Auth::user()->id }}/checkout" method="POST">
    <div class="whole">
      
      <div class="add">
      
      {{ csrf_field() }}
        <h3>Please select Your address </h3>
          <div class="form-check">
            <input required class="form-check-input" type="radio" value=" {{ $data[0]->Address_1 }}" name="address">
            <label class="form-check-label">
              {{ $data[0]->Address_1 }}
            </label>
          </div>
          <div class="form-check">
            <input required class="form-check-input" type="radio" value=" {{ $data[0]->Address_2 }}" name="address">
            <label class="form-check-label">
                {{ $data[0]->Address_2 }}
            </label>
          </div>
        </div>
    
          
          <div class="payment">
        <h3>Please select Your mode of Payment </h3>

          <div class="form-group">
            <input required type="radio" name="payment" value="EMI"> EMI
            <br>
            <input required type="radio" name="payment" value="COD">Cash on Delivery
            <br>
            <input required type="radio" name="payment" value="Debit_Card">Debit Card
            <br>
            <input required type="radio" name="payment" value="Credit_Card">Credit Card
            <br>

          </div>
        </div>
        <div class="summit">
          <button type="submit" class="btn-info">Buy Now</button>
        </div>
        
     </div>
    </form>
    

@endsection