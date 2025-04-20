@extends('frontend.layouts.base')

@section('title', 'Journalist')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Journalist - Search Result</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">

        <div class="filter mb-4">
            <a class="mb-3" href="{{ route('journalist.index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div>

        <div class="row g-3">
            @if($journalists->count() > 0)
            @foreach($journalists as $journalist)
            <div class="col-lg-3">
                <div class="card text-center h-100">
                    <div class="info">
                        <h5>{{ $journalist->name }}</h5>
                    </div>
                    <div class="phone">
                        <p>
                            @if($journalist->category)
                            {{ $journalist->category['name'] }}
                            @endif
                        </p>
                        <p>{{ $journalist->phone }}</p>
                        <p>
                            @if($journalist->city)
                            {{ $journalist->city['name'] }},
                            @endif
                            @if($journalist->district)
                            {{ $journalist->district['name'] }}
                            @endif
                        </p>
                        <p><strong>Tv/Newspaper :</strong> {{ $journalist->media }}</p>
                    </div>
                    <hr>
                    <div class="call-button">
                        <a class="call-btn" href="tel:{{ $journalist->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Journalist Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $journalists->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection