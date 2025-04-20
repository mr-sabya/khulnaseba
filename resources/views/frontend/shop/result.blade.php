@extends('frontend.layouts.base')

@section('title', 'Shop')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Shop - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('shop.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($shops->count() > 0)
            @foreach($shops as $shop)
            <div class="col-lg-4">
                <div class="card p-0 h-100">


                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $shop->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $shop->phone }}</p>
                            <p>{{ $shop->address }}</p>
                            <p>
                                @if($shop->city)
                                {{ $shop->city['name'] }},
                                @endif
                                @if($shop->district)
                                {{ $shop->district['name'] }}
                                @endif
                            </p>
                            <P class="mt-3"><strong>Type : {{ $shop->shopCategory['name'] }}</strong></P>
                            <p>

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
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Shops Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $shops->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection