@extends('layout')

@section('content')



<div class="container mx-auto mt-5 mb-5 py-5" >

    <form method="GET" action="{{action('SearchController@index')}}" accept-charset="UTF-8">
    <div id="searchbox-entry" class="container d-flex flex-column justify-content-start">
        <h1>Unravel serums' best kept secrets</h1>
        <div class="input-group input-group-lg mb-3">
                <input name="query" id="inputGroup-sizing-lg" type="text" class="form-control" placeholder="Enter product title or brand name, eg 'Estee Lauder'..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>


    <div id="search-categories" class="container mt-3 ">
        <div class="row">
        @foreach($blocks as $block)
            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="card text-center m-auto" style="width: 15rem;">
                    <img class="card-img-top" src="{{$block->XXX}}" alt="{{$block->XXX}}">
                    <div class="card-body">
                        <p class="card-text font-weight-bold">{{$block->}}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-item-1"><a href="{{$block->XXX}}">{{$block->XXX}}</a></li>
                            <li class="list-group-item list-item-2"><a href="{{$block->XXX}}">{{$block->XXX}}</a></li>
                            <li class="list-group-item list-item-3"><a href="{{$block->XXX}}">{{$block->XXX}}</a></li>
                            <a href="{{$block->XXX}}" class="btn btn-primary view-all mt-1 justify-content-center">View All</a>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

</div>
@endsection