@extends('frontend.layouts.base')

@section('title', 'Courses')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Courses Registration</h2>
    </div>
</div>
<!-- hero section end -->

<!-- newspaper section start -->
<div class="newspaper-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="mb-5 text-center">
                        <h4>Course Registration for - {{ $course->title }}</h4>

                        @if(Session::has('success'))
                        <p style="color: green;">{{ Session::get('success') }}</p>
                        @endif
                    </div>
                    <form action="{{ route('course.apply.submit') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            @if($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            @if($errors->has('phone'))
                            <span style="color: red;">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="course_id">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $crs)
                                <option value="{{ $crs->id }}" {{ $course->id == $crs->id ? 'selected' : '' }}>{{ $crs->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection