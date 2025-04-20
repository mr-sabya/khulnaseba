@extends('frontend.layouts.base')

@section('title')
{{ $course->title }}
@endsection

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>{{ $course->title }}</h2>
    </div>
</div>
<!-- hero section end -->

<!-- newspaper section start -->
<div class="section-padding">
    <div class="container">

        <div class="categories mt-5">
            <div class="row">

                <div class="col-lg-6">
                    <img src="{{ url('images/course', $course->image)}}" alt="" style="border-radius: 10px;">
                </div>

                <div class="col-lg-6">
                    <h3 class="mb-3">{{ $course->title }}</h3>
                    <div class="row mb-4 g-3">
                        <div class="col-lg-4">
                            <div class="card text-center">
                                <h4>lectures </h4>
                                <h4>{{ $course->lecture }}</h4>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card text-center">
                                <h4>Duration </h4>
                                <h4>{{ $course->duration }}</h4>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card text-center">
                                <h4>Projects </h4>
                                <h4>{{ $course->projects }}</h4>
                            </div>
                        </div>
                    </div>
                    <p>
                        {{ $course->short_desc }}
                    </p>

                </div>
            </div>


            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="bg-body-tertiary p-4  " style="border-radius: 10px;">
                        {!! $course->details !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <h4>Admission Is Going On</h4>
                        <p>Enroll now to any of our Offline (On- Campus) or Online (Live Class) courses as per your suitable time.</p>
                        <br>
                        <h5>
                            @if($course->is_free == 1)
                            Free
                            @else
                            Course Fee {{ $course->price }} BDT
                            @endif
                        </h5>
                        <a href="{{ route('course.apply.form', $course->id)}}" class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

@endsection