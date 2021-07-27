@extends('layouts.app')

@section('content')
    {{-- cart se remove karna hai aur save karwana ahi --}}
    <div class="alert alert-success" role="alert">
       Your order was placed successfully...!!!
    </div>

    <br><br>

    <div class="summary">
        <a href="/{{ Auth::id() }}/cart_history">Click Here to know Your Ordes Summar.....</a>
    </div>

@endsection