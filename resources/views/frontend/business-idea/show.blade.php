@extends('frontend.layouts.base')

@section('title', 'Business Idea')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Business idea</h2>
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
                        <div class="article-img">
                            <img src="{{ url('images/business-idea', $idea->image)}}" alt="{{ $idea->title }}" />
                        </div>
                        <div class="article-title">
                            <h6><a href="#">{{ $idea->businessType['name'] }}</a></h6>
                            <h2>{{ $idea->name }}</h2>
                        </div>
                        <div class="article-content">
                            {!! $idea->details !!}
                        </div>

                    </article>

                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">


                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Related Ideas</h3>
                        </div>
                        <div class="widget-body">
                            @foreach($ideas as $r_idea)
                            <div class="latest-post-aside media d-flex gap-2">
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="{{ url('images/business-idea', $r_idea->image)}}" title="" alt="">
                                    </a>
                                </div>
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">{{ $r_idea->title }}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                    <p>{{ date('d F, Y', strtotime($r_idea->created_at)) }}, {{ $r_idea->created_at->diffForHumans()}}</p>
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
                            <h3>Latest Business Types</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                @foreach($types as $type)
                                <a href="#">{{ $type->name }}</a>
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