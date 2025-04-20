@extends('frontend.layouts.base')

@section('title', 'Restaurant')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Restaurant</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('restaurant.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($restaurants->count()>0)
            @foreach($restaurants as $restaurant)
            <div class="col-lg-3">
                <div class="card p-0 h-100">
                    <div class="image d-flex align-items-center" style="height: 205px; overflow: hidden;">
                        @if($restaurant->image == null)
                        <img src="{{ url('assets/frontend/image/default_image.png') }}" alt="">
                        @else
                        <img src="{{ url('images/food', $restaurant->image) }}" alt="">
                        @endif
                    </div>

                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $restaurant->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $restaurant->phone }}</p>
                            <p>{{ $restaurant->address }}</p>
                            <p>
                                @if($restaurant->city)
                                {{ $restaurant->city['name'] }},
                                @endif
                                @if($restaurant->district)
                                {{ $restaurant->district['name'] }}
                                @endif
                            </p>
                            <P class="mt-3"><strong>Foods : </strong></P>
                            <p>
                                @foreach($restaurant->foods as $food)
                                <span class="badge bg-info">{{ $food->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="call-button text-center pb-3">
                        <a class="call-btn" href="tel:{{ $restaurant->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Restaurants Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $restaurants->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->



@endsection