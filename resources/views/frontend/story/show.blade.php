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

        <div class="blog-single">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
                    <article class="article">
                        <!-- <div class="article-img">
                            <img src="{{ url('images/story', $story->image)}}" alt="{{ $story->title }}" />
                        </div> -->
                        <div class="article-title">
                            <h6><a href="#">{{ $story->storyCategory['name'] }}</a></h6>
                            <h2>{{ $story->name }}</h2>
                        </div>
                        <div class="article-content">
                            {!! $story->details !!}
                        </div>

                    </article>

                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">


                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Related Stories</h3>
                        </div>
                        <div class="widget-body">
                            @foreach($stories as $story)
                            <div class="latest-post-aside media d-flex gap-2">
                                <div class="lpa-right">
                                    <a href="#">
                                        @if($story->image == null)
                                        <img src="{{ url('assets/backend/images/default_image.png') }}" alt="">
                                        @else
                                        <img src="{{ url('images/story', $story->image)}}" alt="{{ $story->title }}" />
                                        @endif
                                    </a>
                                </div>
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">{{ $story->title }}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <p>{{ date('d F, Y', strtotime($story->created_at)) }}, {{ $story->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                @foreach($categories as $type)
                                <a href="{{ route('story.category', $type->slug) }}">{{ $type->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>





    </div>
</div>
<!-- content section end -->

@endsection