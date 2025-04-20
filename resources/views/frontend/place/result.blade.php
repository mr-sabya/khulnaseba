@extends('frontend.layouts.base')

@section('title', 'Tourist Places')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Tourist Places</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blogs section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('place.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>



        <div class="row g-3">
            @foreach($places as $place)
            <div class="col-lg-3">
                <div class="card border-0 h-100 p-0">
                    <div class="card-header border-0 p-0">
                        <img src="{{ url('images/tourist-place', $place->image) }}" alt="">
                    </div>
                    <div class="card-body">
                        <span class="tag tag-teal">{{ $place->placeType['name'] }}</span>
                        <div class="info">
                            <h5 class="m-0"><a href="#">{{ $place->name }}</a></h5>
                            <p><strong>District: {{ $place->district['name'] }}</strong></p>
                        </div>
                        <div class="phone">
                            <p>{{ $place->phone }}</p>
                            <p>{{ $place->address }}</p>


                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="mt-30">
            {{ $places->links() }}
        </div>


    </div>
</div>
<!-- newspaper section end -->

@endsection