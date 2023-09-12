@extends('frontend.layouts.base')

@section('title', 'About Us')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>About Us</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="text">
            {!! $setting->about_us_text !!}
        </div>

    </div>
</div>

@endsection