@extends('frontend.layouts.base')

@section('title', 'Privacy & Policy')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Privacy & Policy</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="text">
            {!! $setting->privacy_policy !!}
        </div>

    </div>
</div>

@endsection