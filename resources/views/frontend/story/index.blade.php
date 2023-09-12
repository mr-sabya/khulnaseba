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

        
        <div class="row g-3">

            @foreach($stories as $story)
            <div class="col-lg-3">
                <div class="card p-0 border-0 h-100">
                    <!-- <div class="card-header border-0 p-0">
                        <img src="{{ url('images/story', $story->image)}}" alt="{{ $story->title }}" />
                    </div> -->
                    <div class="card-body">
                        <span class="tag tag-teal">{{ $story->storyCategory['name'] }}</span>
                        <a href="{{ route('story.show', $story->slug) }}">
                            <h5>{{ $story->title }}</h5>
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
</div>
<!-- content section end -->

@endsection