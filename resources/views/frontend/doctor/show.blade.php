@extends('frontend.layouts.base')

@section('title', 'Doctor')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Doctor</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="row justify-content-center mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <h3 class="text-center">{{ $doctor->name }}</h3>
                    <hr>
                    <div class="person">
                        <div class="image mb-3 text-center">
                            @if($doctor->image == null)
                            <img src="{{ url('assets/frontend/image/doctor.jpg') }}" alt="">
                            @else
                            <img src="{{ url('images/doctor', $doctor->image) }}" alt="">
                            @endif
                        </div>

                        <div class="text text-left">
                            <p class="mb-2"><strong>Professional Degree: </strong> {{ $doctor->degree }}</p>
                            <p class="mb-2"><strong>Category:</strong> {{ $doctor->type['name'] }}</p>
                            <p class="mb-2"><strong>Designation:</strong> {{ $doctor->designation }}</p>
                            <p class="mb-2"><strong>Hospital Name:</strong> {{ $doctor->hospital }}</p>
                            <p class="mb-2"><strong>BMDC No:</strong> {{ $doctor->bmdc_no }}</p>
                            <p class="mb-2"><strong>District:</strong>
                                @if($doctor->district)
                                {{ $doctor->district['name'] }}
                                @endif
                            </p>
                            <p class="mb-2"><strong>City:</strong>
                                @if($doctor->city)
                                {{ $doctor->city['name'] }}
                                @endif
                            </p>

                            <p class="mb-2"><strong>Details: </strong><br>
                                {{ $doctor->details }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5>Chamber Details</h5>
                        <hr>

                        @foreach($doctor->chambers as $chamber)
                        <div class="chamber pb-4">
                            <p class="mb-2"><strong>{{ $chamber->hospital['name'] }}</strong></p>
                            <p class="mb-2">{{ $chamber->hospital['address'] }}, {{ $chamber->hospital['city']['name'] }}, {{ $chamber->hospital['district']['name'] }}</p>
                            <p class="mb-2">Phone: {{ $chamber->hospital['phone'] }}</p>
                            <p class="mb-2">Time: {{ $chamber->time }}</p>

                            <div class="mt-4">
                                <p class="mb-4"><strong>For Serial :</strong></p>
                                <div class="call-button d-flex gap-4 justify-content-center">
                                    <a class="call-btn" href="tel:{{ $chamber->phone_1 }}"><i class="fa-solid fa-phone"></i> Call: {{ $chamber->phone_1 }}</a>
                                    @if($chamber->phone_2 != null)
                                    <a class="call-btn" href="tel:{{ $chamber->phone_2 }}"><i class="fa-solid fa-phone"></i> Call: {{ $chamber->phone_2 }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($doctor->chambers->count() > 1)
                        <hr>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="related mt-5">

            <h3>Related Doctors</h3>
            <div class="row g-3">
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
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="call-button">
                            <a class="call-btn" href="{{ route('doctor.show', $doctor->id) }}"><i class="fa-solid fa-circle-info"></i> Details</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
<!-- newspaper section end -->

@endsection