@extends('frontend.layouts.base')

@section('title', 'Police Station')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Police Station</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('thana.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>

        <div class="row g-3">
            @if($thanas->count()>0)
            @foreach($thanas as $thana)
            <div class="col-lg-3">
                <div class="hospital card text-center h-100">
                    <div class="info">
                        <h5>{{ $thana->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>Type :
                            @if($thana->category)
                            {{ $thana->category['name'] }}
                            @endif
                        </p>
                        <p>{{ $thana->phone }}</p>
                        <p>{{ $thana->address }}, @if($thana->district){{ $thana->district['name'] }}@endif</p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="{{ route('thana.show', $thana->id) }}"><i class="fa-solid fa-handcuffs"></i> Police</a>
                        <a class="call-btn" href="tel:{{ $thana->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Police Station Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $thanas->links() }}
        </div>

    </div>
</div>
<!-- content section end -->

@endsection