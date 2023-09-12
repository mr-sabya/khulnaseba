@extends('frontend.layouts.base')

@section('title', 'Help')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Help</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="text">
            {!! $setting->help !!}
        </div>

    </div>
</div>

@endsection