@extends('frontend.layouts.base')

@section('title', 'নামাযের সময়সূচি')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>নামাযের সময়সূচি</h2>
    </div>
</div>
<!-- hero section end -->


<!-- content section start -->
<div class="section-padding">
    <div class="container">

        <div class="row justify-content-center">
            @if($namaz)
            <div class="col-lg-6">
                <div class="card text-center">
                    <h4>{{ $namaz->hijri_date }}</h4>
                    <h4>{{ date('d F, Y', strtotime($namaz->date)) }}</h4>
                    <h4><a href="#">{{ $namaz->division['name'] }}</a></h4>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <td>তাহাজ্জুদ</td>
                                <td>{{ $namaz->tahajjud }}</td>
                            </tr>
                            <tr>
                                <td>ফজর</td>
                                <td>{{ $namaz->fojr }}</td>
                            </tr>
                            <tr>
                                <td>সূর্যোদয়</td>
                                <td>{{ $namaz->sun_rise }}</td>
                            </tr>
                            <tr>
                                <td>ইশরাক, চাশত</td>
                                <td>{{ $namaz->ishraq }}</td>
                            </tr>
                            <tr>
                                <td>জুমা</td>
                                <td>{{ $namaz->noon }}</td>
                            </tr>
                            <tr>
                                <td>যোহর</td>
                                <td>{{ $namaz->johor }}</td>
                            </tr>
                            <tr>
                                <td>আসর</td>
                                <td>{{ $namaz->asor }}</td>
                            </tr>
                            <tr>
                                <td>সূর্যাস্ত</td>
                                <td>{{ $namaz->sun_set }}</td>
                            </tr>
                            <tr>
                                <td>মাগরিব, ইফতার</td>
                                <td>{{ $namaz->magrib }}</td>
                            </tr>
                            <tr>
                                <td>ইশা</td>
                                <td>{{ $namaz->isha }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-6">
                <div class="filter mb-4">
                    <a class="mb-3" href="{{ route('index') }}"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
                </div>
                <div class="card text-center">
                    <h4>No Data Found!!!</h4>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
<!-- content section end -->

@endsection