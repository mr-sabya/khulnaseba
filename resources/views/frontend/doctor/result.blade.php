@extends('frontend.layouts.base')

@section('title', 'Doctor')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Doctor - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('doctor.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>


        <div class="row g-3">
            @if($doctors->count()>0)
            @foreach($doctors as $doctor)
            <div class="col-lg-4">
                <div class="person card h-100">
                    <div class="all-info">
                        <div class="image">
                            @if($doctor->image == null)
                            <img src="{{ url('assets/frontend/image/doctor.jpg') }}" alt="">
                            @else
                            <img src="{{ url('images/doctor', $doctor->image) }}" alt="">
                            @endif
                        </div>

                        <div class="text">
                            <div class="info ">
                                <h4>{{ $doctor->name }}</h4>
                            </div>
                            <div class="phone">
                                <p>{{ $doctor->degree }}</p>
                                <p>{{ $doctor->type['name'] }}</p>
                                <p>
                                    @if($doctor->city)
                                    {{ $doctor->city['name'] }},
                                    @endif
                                    @if($doctor->district)
                                    {{ $doctor->district['name'] }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="call-button text-center">
                        <a class="call-btn" href="{{ route('doctor.show', $doctor->id) }}"><i class="fa-solid fa-circle-info"></i> Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Doctor Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $doctors->links() }}
        </div>
    </div>
</div>
<!-- newspaper section end -->




@endsection