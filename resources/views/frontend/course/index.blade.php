@extends('frontend.layouts.base')

@section('title', 'Courses')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Courses</h2>
    </div>
</div>
<!-- hero section end -->

<!-- newspaper section start -->
<div class="newspaper-section section-padding">
    <div class="container">
        <h3 class="mb-4">Categories</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-2">
                <div class="card p-3 border-0 shadow">
                    <a href="#" class="d-flex justify-content-center align-items-center w-100 flex-column">
                        <img src="{{ url('images/course', $category->image)}}" alt="" style="width: 80px;" class="mb-3">
                        <h5 style="font-size: 16px;">{{ $category->name }}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>


        <div class="categories mt-5">
            <h3 class="mb-4">Courses</h3>

            <div class="row">
                @foreach($courses as $course)
                <div class="col-lg-3">
                    <div class="card p-0">
                        <div class="image">
                            <img src="{{ url('images/course', $course->image)}}" alt="">
                        </div>
                        <div class="text p-3">
                            <h4 style="font-size: 20px;"><a href="{{ route('course.show', $course->slug)}}">{{ $course->title }}</a></h4>
                            <p class="d-flex justify-content-between"><span>{{ $course->lecture }} Class</span> <span>{{ $course->duration }} Months</span></p>
                            <hr>
                            <h5>
                                @if($course->is_free == 1)
                                Free
                                @else
                                Course Fee {{ $course->price }} BDT
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection