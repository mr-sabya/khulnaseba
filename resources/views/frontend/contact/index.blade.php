@extends('frontend.layouts.base')

@section('title', 'Contact Us')

@section('content')
<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Contact Us</h2>
    </div>
</div>
<!-- hero section end -->

<!-- blos section start -->
<div class="section-padding">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="row contact">
                            <div class="col-md-4">
                                <div class="card w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Address:</span> {{ $setting->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Phone:</span> <a href="tel://1234567920">{{ $setting->phone }}</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Email:</span> <a href="">{{ $setting->email }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h3 class="heading mb-4 text-start">Let's talk about everything!</h3>
                                <p>{{ $setting->contact_text }}</p>
                                <p><img src="{{ url('assets/frontend/image/undraw-contact.svg') }}" alt="Image" class="img-fluid"></p>
                            </div>
                            <div class="col-md-6">


                                <form class="mb-5" method="post" id="contactForm" name="contactForm">
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                            <span class="submitting"></span>
                                        </div>
                                    </div>
                                </form>
                                <div id="form-message-warning mt-4"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection