@extends('layouts.app')

@section('content')
   
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      {{-- <li data-target="#myCarousel" data-slide-to="3"></li> --}}
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img class="imgg" src="{{asset('assets/img/iphone12.jpg')}}" alt="Iphone">
        <div class="carousel-caption">
          <h3>IPhone</h3>
          <p>For best Experience</p>
        </div>
      </div>
  
      <div class="item">
        <img class="imgg" src="{{asset('assets/img/predator.jpg')}}" >
        <div class="carousel-caption">
          <h3>Predator</h3>
          <p>Enrich Your Gaming Experience!</p>
        </div>
      </div>
  
      <div class="item">
        <img class="imgg"src="{{asset('assets/img/rado.png')}}" >
        <div class="carousel-caption">
          <h3>Rado</h3>
          <p>Best of its Class</p>
        </div>
      </div>
    </div>
  
    <!-- Left and rightg controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

    <br><br><br><br><br>
    {{-- <div class="cate">
      <div class="mob">
        <a href="/Mobiles"><button class="btn">Mobiles</button></a>
      </div>
      <div class="lap">
        <a href="/Laptops"><button class="btn">Laptops</button></a>
      </div>
      <div class="wat">
        <a href="/Watches"><button class="btn">Watches</button></a>
      </div>
    </div> --}}
  </div>
  <br><br><br><br><br>
  - <div class="cate">
      <div class="mob">
        <a href="/Mobiles">Mobiles</a>
      </div>
      <div class="mob">
        <a href="/Laptops">Laptops</a>
      </div>
      <div class="mob">
        <a href="/Watches">Watches</a>
      </div> 
      <div class="mob">
        <a href="/all">All Products</a>
      </div> 
    </div>

@endsection
