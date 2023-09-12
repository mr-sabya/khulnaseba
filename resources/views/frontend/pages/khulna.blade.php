@extends('frontend.layouts.base')

@section('title', 'About Khulna')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>About Khulna</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="text">
            {!! $setting->about_khulna !!}
        </div>

    </div>
</div>

@endsection