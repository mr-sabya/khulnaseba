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

        
        <div class="row g-3">

            @foreach($ideas as $idea)
            <div class="col-lg-3">
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
</div>
<!-- content section end -->

@endsection