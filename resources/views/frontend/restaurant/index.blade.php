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
            <form action="">
                <div class="row g-2">
                    <div class="col-lg-2">
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Seclect District</option>
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>Select City</option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Seclect Food</option>
                            @foreach($foods as $food)
                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="row g-3">
            @foreach($restaurants as $restaurant)
            <div class="col-lg-3">
                <div class="card p-0">
                    <div class="image">
                        @if($restaurant->image == null)
                        <img src="{{ url('assets/frontend/image/default_image.png') }}" alt="">
                        @else
                        <img src="{{ url('images/restaurant', $restaurant->image) }}" alt="">
                        @endif
                    </div>

                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $restaurant->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $restaurant->phone }}</p>
                            <p>{{ $restaurant->address }}</p>
                            <p>{{ $restaurant->city['name'] }}, {{ $restaurant->district['name'] }}</p>
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
                        <a class="call-btn" href="#"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-30">
            {{ $restaurants->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection