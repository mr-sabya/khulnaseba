@extends('frontend.layouts.base')

@section('content')
<!-- slider section start -->
<div class="hero-section">
	<div class="container">
		<div class="hero">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="banner-text">
						<h5>Always with you</h5>
						<h1>Khulna Seba <br> Online Help Center</h1>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi rerum exercitationem similique minus animi laudantium, magni vel asperiores earum saepe?</p>

						<a href="#" class="btn custom-btn mt-4">Learn More</a>
					</div>
				</div>
				<div class="col-lg-6">
					<img src="{{ url('assets/frontend/image/collage.png') }}" alt="">
				</div>
			</div>

		</div>
	</div>
</div>
<!-- slider section end -->

<!-- service area start -->
<div class="services section-padding">
	<div class="container">
		<h2 class="heading">Our Services</h2>

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
				<a href="#">
					<div class="service ghostwhite">
						<div class="text">
							<h4>Train Service</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/train.png') }}" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="#">
					<div class="service lavender">
						<div class="text">
							<h4>Plane Service</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="{{ url('assets/frontend/image/plane.png') }}" alt="">
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
				<a href="{{ route('doctor.index') }}">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-doctor-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Doctor</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-police-96.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Police</h5>
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
				<a href="#">
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
				<a href="#">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-web-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>E-Help</h5>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="{{ url('assets/frontend/image/icons8-online-class-64.png') }}" alt="">
					</div>
					<div class="text">
						<h5>Training Center</h5>
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

		<div class="testimonial-slider">

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

		</div>

		<div class="testionial-dots"></div>

	</div>
</div>
<!-- testimonial section end -->


<!-- blos section start -->
<div class="blogs section-padding">
	<div class="container">
		<h2 class="heading">What our users say</h2>

		<div class="row">

			<div class="col-lg-3">
				<div class="card p-0 border-0">
					<div class="card-header border-0 p-0">
						<img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">Technology</span>
						<a href="#">
							<h5>Why is the Tesla Cybertruck designed the way it is?</h5>
						</a>
						<p>
							An exploration into the truck's polarising design
						</p>
						<div class="user">
							<img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
							<div class="user-info">
								<h5>July Dec</h5>
								<small>2h ago</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="col-lg-3">
				<div class="card p-0 border-0">
					<div class="card-header border-0 p-0">
						<img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">Technology</span>
						<a href="#">
							<h5>Why is the Tesla Cybertruck designed the way it is?</h5>
						</a>
						<p>
							An exploration into the truck's polarising design
						</p>
						<div class="user">
							<img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
							<div class="user-info">
								<h5>July Dec</h5>
								<small>2h ago</small>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card p-0 border-0">
					<div class="card-header border-0 p-0">
						<img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">Technology</span>
						<a href="#">
							<h5>Why is the Tesla Cybertruck designed the way it is?</h5>
						</a>
						<p>
							An exploration into the truck's polarising design
						</p>
						<div class="user">
							<img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
							<div class="user-info">
								<h5>July Dec</h5>
								<small>2h ago</small>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card p-0 border-0">
					<div class="card-header border-0 p-0">
						<img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg" alt="rover" />
					</div>
					<div class="card-body">
						<span class="tag tag-teal">Technology</span>
						<a href="#">
							<h5>Why is the Tesla Cybertruck designed the way it is?</h5>
						</a>
						<p>
							An exploration into the truck's polarising design
						</p>
						<div class="user">
							<img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
							<div class="user-info">
								<h5>July Dec</h5>
								<small>2h ago</small>
							</div>
						</div>
					</div>
				</div>
			</div>

		


		</div>

		<div class="load-more">
			<a href="#" class="custom-btn">Show All</a>
		</div>
	</div>
</div>
<!-- blos section end -->

@endsection