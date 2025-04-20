@extends('frontend.layouts.base')

@section('title', 'Business Ideas')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Business ideas</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="blogs section-padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="row g-3">

                    @foreach($ideas as $idea)
                    <div class="col-lg-4">
                        <div class="card p-0 border-0 h-100">
                            <div class="card-header border-0 p-0">
                                <img src="{{ url('images/business-idea', $idea->image)}}" alt="{{ $idea->title }}" />
                            </div>
                            <div class="card-body">
                                <span class="tag tag-teal">{{ $idea->businessType['name'] }}</span>
                                <a href="{{ route('business.show', $idea->slug) }}">
                                    <h5>{{ $idea->title }}</h5>
                                </a>

                                {{ str_limit($idea->short_description, 80) }}

                                <div class="user">

                                    <div class="user-info">
                                        <p>{{ date('d F, Y', strtotime($idea->created_at)) }}, {{ $idea->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-30">
                    {{ $ideas->links() }}
                </div>
            </div>

            <div class="col-lg-3 blog-aside">
                <div class="widget widget-latest-post m-0">
                    <div class="widget-title">
                        <h3>Categories</h3>
                    </div>
                    <div class="card-body">
                        <p class="border-bottom d-flex w-100 justify-content-between ">
                            <a href="{{ route('business.index') }}" class="{{ $c_category == 'all' ? 'text-primary' : '' }}">All Categories </a> <span>{{ $ideas->count() }}</span>
                        </p>
                        @foreach($types as $type)
                        <p class="border-bottom d-flex w-100 justify-content-between ">
                            <a href="{{ route('business.type', $type->id)}}" class="{{ $c_category == $type->name ? 'text-primary' : '' }}">{{ $type->name }}</a> <span>{{ $type->ideas->count() }}</span>
                        </p>
                        @endforeach
                    </div>
                </div>

                <div class="widget widget-latest-post mt-4">
                    <div class="widget-title">
                        <h3>Related Stories</h3>
                    </div>
                    <div class="widget-body">
                        @foreach($recent_ideas as $business)
                        <div class="latest-post-aside media d-flex gap-2">
                            <div class="lpa-right">
                                <a href="{{ route('business.show', $business->slug) }}">
                                    @if($business->image == null)
                                    <img src="{{ url('assets/backend/images/default_image.png') }}" alt="">
                                    @else
                                    <img src="{{ url('images/business-idea', $business->image)}}" alt="{{ $business->title }}" />
                                    @endif
                                </a>
                            </div>
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h5><a href="{{ route('business.show', $business->slug) }}">{{ $business->title }}</a></h5>
                                </div>
                                <div class="lpa-meta">
                                    <p>{{ date('d F, Y', strtotime($business->created_at)) }}, {{ $business->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- content section end -->

@endsection