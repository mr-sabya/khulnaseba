@extends('frontend.layouts.base')

@section('title', 'Golpo/Adda')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Golpo/Adda</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="blogs section-padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="row g-3">

                    @foreach($stories as $story)
                    <div class="col-lg-4">
                        <div class="card p-0 border-0 h-100">
                            <div class="card-header border-0 p-0">
                                <a href="{{ route('story.show', $story->slug) }}" class="w-100">
                                    @if($story->image == null)
                                    <img src="{{ url('assets/backend/images/default_image.png') }}" alt="">
                                    @else
                                    <img src="{{ url('images/story', $story->image)}}" alt="{{ $story->title }}" />
                                    @endif
                                </a>
                            </div>
                            <div class="card-body">
                                <span class="tag tag-teal">{{ $story->storyCategory['name'] }}</span>
                                <a href="{{ route('story.show', $story->slug) }}">
                                    <h5 class="m-0">{{ $story->title }}</h5>
                                </a>
                                <div class="user">
                                    <div class="user-info">
                                        <p>{{ date('d F, Y', strtotime($story->created_at)) }}, {{ $story->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-30">
                    {{ $stories->links() }}
                </div>
            </div>

            <div class="col-lg-3 blog-aside">
                <div class="widget widget-latest-post m-0">
                    <div class="widget-title">
                        <h3>Categories</h3>
                    </div>
                    <div class="card-body">
                        <p class="border-bottom d-flex w-100 justify-content-between ">
                            <a href="{{ route('story.index') }}" class="{{ $c_category == 'all' ? 'text-primary' : '' }}">All Categories </a> <span>{{ $stories->count() }}</span>
                        </p>
                        @foreach($categories as $category)
                        <p class="border-bottom d-flex w-100 justify-content-between ">
                            <a href="{{ route('story.category', $category->slug) }}" class="{{ $c_category == $category->name ? 'text-primary' : '' }}">{{ $category->name }}</a> <span>{{ $category->stories->count() }}</span>
                        </p>
                        @endforeach
                    </div>
                </div>

                <div class="widget widget-latest-post mt-4">
                    <div class="widget-title">
                        <h3>Related Stories</h3>
                    </div>
                    <div class="widget-body">
                        @foreach($recent_stories as $story)
                        <div class="latest-post-aside media d-flex gap-2">
                            <div class="lpa-right">
                                <a href="{{ route('story.show', $story->slug) }}">
                                    @if($story->image == null)
                                    <img src="{{ url('assets/backend/images/default_image.png') }}" alt="">
                                    @else
                                    <img src="{{ url('images/story', $story->image)}}" alt="{{ $story->title }}" />
                                    @endif
                                </a>
                            </div>
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h5><a href="{{ route('story.show', $story->slug) }}">{{ $story->title }}</a></h5>
                                </div>
                                <div class="lpa-meta">
                                    <p>{{ date('d F, Y', strtotime($story->created_at)) }}, {{ $story->created_at->diffForHumans()}}</p>
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