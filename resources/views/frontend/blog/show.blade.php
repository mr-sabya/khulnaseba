@extends('frontend.layouts.base')

@section('title', 'Blog')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Blog</h2>
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
                            <img src="{{ url('images/blog', $blog->image)}}" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#">{{ $blog->blogCategory['name'] }}</a></h6>
                            <h2>{{ $blog->title }}</h2>
                            <div class="media">
                                <!-- date -->
                            </div>
                        </div>
                        <div class="article-content">
                            {!! $blog->blog !!}
                        </div>
                    </article>
                    <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button type="submit" class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-body">

                            <ul class="p-0">
                                @foreach($categories as $category)
                                <li class="border-bottom d-flex justify-content-between">
                                    <a href="#"> {{ $category->name }} </a>
                                    <span>({{ $category->blogs->count() }})</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Author -->

                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            @foreach($recent_blogs as $recent_blog)
                            <div class="latest-post-aside media d-flex gap-2">
                                <div class="lpa-right">
                                    <a href="{{ route('blog.show', $recent_blog->slug) }}">
                                        <img src="{{ url('images/blog', $recent_blog->image)}}" title="" alt="">
                                    </a>
                                </div>
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="{{ route('blog.show', $recent_blog->slug) }}">{{ $recent_blog->title }}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <p>{{ date('d F, Y', strtotime($recent_blog->created_at)) }}, {{ $recent_blog->created_at->diffForHumans()}}</p>
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
                            <h3>Latest Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Travel</a>
                                <a href="#">Web Design</a>
                                <a href="#">Marketing</a>
                                <a href="#">Research</a>
                                <a href="#">Managment</a>
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