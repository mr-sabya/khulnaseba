@extends('frontend.layouts.base')

@section('title', 'Hotel')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Hotel</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="hotel section-padding">
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
                        <button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="row g-3">
            @foreach($hotels as $hotel)
            <div class="col-lg-3">
                <div class="card p-0 h-100">
                    <div class="image">
                        @if($hotel->image == null)
                        <img src="{{ url('assets/frontend/image/default_image.png') }}" alt="">
                        @else
                        <img src="{{ url('images/hotel', $hotel->image) }}" alt="">
                        @endif

                        <div class="star">
                            @if($hotel->star == 1)
                            <i class="fa-solid fa-star"></i>
                            @elseif($hotel->star == 2)
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            @elseif($hotel->star == 3)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            @elseif($hotel->star == 4)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            @else
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            @endif
                        </div>
                    </div>

                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $hotel->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $hotel->phone }}</p>
                            <p>{{ $hotel->address }}</p>
                            <p>
                                @if($hotel->city)
                                {{ $hotel->city['name'] }},
                                @endif
                                @if($hotel->district)
                                {{ $hotel->district['name'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="call-button text-center pb-3">
                        <a class="call-btn" href="tel:{{ $hotel->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                        <a class="call-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#details_{{ $hotel->id }}"><i class="fa-solid fa-circle-info"></i> Details</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="details_{{ $hotel->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $hotel->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {!! $hotel->details !!}
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-30">
            {{ $hotels->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection