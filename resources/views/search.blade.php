@extends('layouts.app')

@section('content')
<div class="col-sm-4">   
    <h2>Your search results</h2>
    @foreach ($res as $item)
        <div class="con"><a href="details/{{ $item->product_id }}">
            <div class="before">
                <img class="imagg" src="{{ $item->image }}" alt="img">
            </div>
            <div class="first">
                <p>{{ $item->Product_Name }}</p>
            </div>
            <div class="second">
                <p>{{ $item->price }}</p>
            </div>
        </div></a>
        <br>
    @endforeach
    {{ $res->links() }}
</div>
@endsection