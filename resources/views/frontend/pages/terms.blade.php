@extends('frontend.layouts.base')

@section('title', 'Terms and Conditions')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Terms and Conditions</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="text">
            {!! $setting->terms_conditions !!}
        </div>

    </div>
</div>

@endsection