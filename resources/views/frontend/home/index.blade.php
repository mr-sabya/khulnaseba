@extends('frontend.layouts.base')

@section('content')
<!-- slider section start -->
<div class="hero-section">
	<div class="container">
		<div class="hero">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="banner-text">
						<h5>{{ $setting->banner_sub_heading }}</h5>
						<h1>{!! $setting->banner_heading !!}</h1>
						<p>{{ $setting->text }}</p>

						<a href="#" class="btn custom-btn mt-4">About Khulna <i class="fa-solid fa-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-lg-6">
					@if($setting->banner_image == null)
					<img src="{{ url('assets/frontend/image/khulna-all.png') }}" alt="">
					@else
					<img src="{{ url('images/setting', $setting->banner_image) }}" alt="">
					@endif
				</div>
			</div>

		</div>
	</div>
</div>
<!-- slider section end -->

<!-- weather -->
<div class="weather">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card border-0">
					<div class="row">
						<div class="col-lg-6">
							<div class="d-flex  gap-3">
								<div class="icon">

									<img src="" id="icon" alt="" style="width: 80px;">
								</div>
								<div class="info">
									<h3><span id="temp_in_c"></span>°C</h3>
									<p>Feels Like: <span id="feelslike_c"></span>°C<br>
										Humidity: <span id="humidity"></span>%<br>
										Wind: <span id="wind_kph"></span>km/h</p>
								</div>
							</div>

						</div>

						<div class="col-lg-6 text-end">
							<h3>Weather</h3>
							<p id="time"></p>
							<p id="info"></p>
							<p> <span id="city"></span>, <span id="country"></span></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- weather -->

<!-- service area start -->
<div class="services section-padding">
	<div class="container">
		<h2 class="heading">Top Services</h2>

		<div class="servive-section">
			<div class="item">
				<a href="{{ route('newspaper.index') }}">
					<div class="service lavender">
						<div class="text">
							<h4>News</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/news.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('blood-donor.index')}}">
					<div class="service cornsilk">
						<div class="text">
							<h4>Bolod Donor</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/bolod-donate.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('hospital.index') }}">
					<div class="service honeydew">
						<div class="text">
							<h4>Hospital</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/hospital.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('ambulance.index') }}">
					<div class="service ghostwhite">
						<div class="text">
							<h4>Ambulance</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/ambulance.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('doctor.index') }}">
					<div class="service ghostwhite">
						<div class="text">
							<h4>Doctor</h4>
							<p>Get all doctors beside you</p>
						</div>
						<img src="{{ url('assets/frontend/image/doctor.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('bus.index') }}">
					<div class="service honeydew">
						<div class="text">
							<h4>Bus Tickets</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/bus.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="{{ route('train.index') }}">
					<div class="service lavender">
						<div class="text">
							<h4>Train Service</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/train.png') }}" alt="">
					</div>
				</a>
			</div>



			<div class="item">
				<a href="{{ route('restaurant.index') }}">
					<div class="service cornsilk">
						<div class="text">
							<h4>Restaurant</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/restaurant.png') }}" alt="">
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- service area end -->

<!-- about section -->
<div class="about section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				@if($setting->about_us_image == null)
				<img src="{{ url('assets/frontend/image/contact-centre-agent-out-of-laptop-760.png') }}" alt="" class="rounded">
				@else
				<img src="{{ url('images/setting', $setting->about_us_image) }}" alt="" class="rounded">
				@endif
			</div>
			<div class="col-lg-6">
				<h2 class="heading text-start mb-4">About Us</h2>
				<div class="about_us_text">
					{!! $setting->about_us_short_text !!}
				</div>


				<a href="{{ route('about.index') }}" class="btn custom-btn">Learn More <i class="fa-solid fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
</div>
<!-- about section end -->

<!-- banner section start -->
<div class="banners section-padding">
	<div class="container">
		<div class="banner-section">
			<div class="banner cornsilk">
				<div class="image">
					<img src="{{ url('assets/frontend/image/bigstock-148711844.jpg') }}" alt="">
					<div class="shape"></div>
				</div>

				<div class="banner-text">

					<h3 class="mb-15">We will provide All types of online support</h3>
					<p class="mb-15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque iusto minima
						asperiores tenetur alias ipsam!</p>
					<a href="#" class="site-url">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>

			<div class="banner cornsilk">
				<div class="image">
					<img src="{{ url('assets/frontend/image/bigstock-148711844.jpg') }}" alt="">
					<div class="shape"></div>
				</div>

				<div class="banner-text">

					<h3 class="mb-15">We will provide All types of online support</h3>
					<p class="mb-15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque iusto minima
						asperiores tenetur alias ipsam!</p>
					<a href="#" class="site-url">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- banner section end -->

<!-- service section start -->
<div class="other-services section-padding">
	<div class="container">
		<h2 class="heading">Our Services</h2>

		<div class="service-container">

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-plane-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Plane Service</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('thana.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-police-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Thana/Police</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('journalist.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-journalist-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>journalist</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('lawyer.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-lawyer-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Lawyer</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('livetv.index')}}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-live-tv-66.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Live Tv</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('fireservice.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-fire-truck-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Fire Service</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-electricity-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Polli Biddut</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('hotel.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-hotel-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Hotel</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('ehelp.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-web-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>E-Help</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('training_centers.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-online-class-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Training Center</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('govt_office.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-office-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Govt Office</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('job.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-job-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Jobs</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('helpline.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-helpline-66.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Helpline</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('school.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-school-100.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Educational Institute</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('library.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-library-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Library</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="{{ route('business.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-business-idea-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Business Idea</h5>
					</div>
				</a>
			</div>




		</div>
	</div>
</div>
<!-- service section end -->

<!-- testimonial section start -->
<div class="testimonials section-padding bg-custom">
	<div class="container">
		<h2 class="heading">What our users say</h2>

		@if($feedbacks->count() > 0)
		<div class="testimonial-slider">
			@foreach($feedbacks as $feedback)
			<div class="item">
				<div class="text">
					<div class="rating">
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star-half-stroke"></i>
						<i class="fa-regular fa-star"></i>
					</div>
					<div class="speech">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, obcaecati expedita
							consequuntur ea dolores dolorum ut sapiente unde laudantium at.</p>
					</div>

					<div class="shape"></div>
				</div>
				<div class="customer">
					<div class="image">
						<img src="{{ url('assets/frontend/image/person.jpg') }}" alt="">
					</div>
					<div class="info">
						<h4>Jhon Doe</h4>
						<p>Web Developer</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="testionial-dots"></div>
		@else
		<div class="text-center">
			<h4>No Feedbacks Found!</h4>
		</div>
		@endif

	</div>
</div>
<!-- testimonial section end -->


<!-- blos section start -->
<div class="blogs section-padding">
	<div class="container">
		<h2 class="heading">Our Blogs</h2>

		<div class="row g-3">

			@if($blogs->count() > 0)
			@foreach($blogs as $blog)
			<div class="col-lg-3">
				<div class="card p-0 border-0">
					<div class="card-header border-0 p-0">
						<img src="{{ url('images/blog', $blog->image) }}" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">{{ $blog->blogCategory['name'] }}</span>
						<a href="#">
							<h5>{{ $blog->title }}</h5>
						</a>

						{!! str_limit($blog->blog, 80) !!}

						<div class="user">

							<div class="user-info">
								<p>{{ date('d F, Y', strtotime($blog->created_at)) }}, {{ $blog->created_at->diffForHumans()}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Blogs Found!</h4>
				</div>
			</div>
			@endif
		</div>

		<div class="load-more">
			<a href="{{ route('blog.index')}}" class="custom-btn">Show All <i class="fa-solid fa-arrow-right"></i></a>
		</div>
	</div>
</div>
<!-- blos section end -->

@endsection


@section('scripts')
<script>
	$(document).ready(function() {

		$.ajax({
			type: "GET",
			url: "https://api.weatherapi.com/v1/current.json?key=30ad8e14b5aa40d08a3191653233107&q=Khulna&aqi=no",
			dataType: 'json',
			success: function(data) {
				$('#info').html(data.current.condition.text)
				$('#temp_in_c').html(data.current.temp_c)
				$('#humidity').html(data.current.humidity)
				$('#wind_kph').html(data.current.wind_kph)
				$('#feelslike_c').html(data.current.feelslike_c)
				$('#time').html(data.location.localtime)
				$('#icon').attr('src', data.current.condition.icon)
				$('#city').html(data.location.name)
				$('#country').html(data.location.country)
			}
		});
	});
</script>
@endsection