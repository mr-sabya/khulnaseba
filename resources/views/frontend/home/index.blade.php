@extends('frontend.layouts.base')

@section('content')
<!-- slider section start -->
<div class="hero-slider">
	<div class="hero" id="hero">
		<div class="slider" style="background-image: url({{ url('assets/frontend/image/new-project-1599296482873.jpeg')}} );">
			<div class="container">
				<div class="text-area">
					<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae?</h2>
				</div>
			</div>
		</div>

		<div class="slider" style="background-image: url({{ url('assets/frontend/image/new-project-1599296482873.jpeg')}} );"">
			<div class="container">
				<div class="text-area">
					<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae?</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-dots"></div>
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
				<a href="#">
					<div class="service honeydew">
						<div class="text">
							<h4>Bus Tickets</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="assets/image/bus.png" alt="">
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
						<img src="assets/image/train.png" alt="">
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
						<img src="assets/image/plane.png" alt="">
					</div>
				</a>
			</div>

			<div class="item">
				<a href="#">
					<div class="service cornsilk">
						<div class="text">
							<h4>Restaurant</h4>
							<p>Get all newpapers at once</p>
						</div>
						<img src="assets/image/restaurant.png" alt="">
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
					<img src="assets/image/bigstock-148711844.jpg" alt="">
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
					<img src="assets/image/bigstock-148711844.jpg" alt="">
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
						<img src="{{ url('assets/frontend/image/icons8-doctor-96.png') }}" alt="">
					</div>
					<div class="text">
						<h4>Doctor</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-police-96.png" alt="">
					</div>
					<div class="text">
						<h4>Police</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-journalist-64.png" alt="">
					</div>
					<div class="text">
						<h4>journalist</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-lawyer-64.png" alt="">
					</div>
					<div class="text">
						<h4>Lawyer</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-live-tv-66.png" alt="">
					</div>
					<div class="text">
						<h4>Live Tv</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-fire-truck-96.png" alt="">
					</div>
					<div class="text">
						<h4>Fire Service</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-electricity-64.png" alt="">
					</div>
					<div class="text">
						<h4>Electricity</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-hotel-64.png" alt="">
					</div>
					<div class="text">
						<h4>Hotel</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-web-64.png" alt="">
					</div>
					<div class="text">
						<h4>E-Help</h4>
					</div>
				</a>
			</div>

			<div class="service card">
				<a href="#">
					<div class="icon">
						<img src="assets/image/icons8-online-class-64.png" alt="">
					</div>
					<div class="text">
						<h4>Training Center</h4>
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
						<img src="assets/image/person.jpg" alt="">
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
						<img src="assets/image/person.jpg" alt="">
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
						<img src="assets/image/person.jpg" alt="">
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
						<img src="assets/image/person.jpg" alt="">
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
						<img src="assets/image/person.jpg" alt="">
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

		<div class="blog-container">
			<div class="card">
				<div class="card-header">
					<img src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg"
					alt="rover" />
				</div>
				<div class="card-body">
					<span class="tag tag-teal">Technology</span>
					<a href="#">
						<h4>Why is the Tesla Cybertruck designed the way it is?</h4>
					</a>
					<p>
						An exploration into the truck's polarising design
					</p>
					<div class="user">
						<img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo"
						alt="user" />
						<div class="user-info">
							<h5>July Dec</h5>
							<small>2h ago</small>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<img src="https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg"
					alt="ballons" />
				</div>
				<div class="card-body">
					<span class="tag tag-purple">Popular</span>
					<a href="#">
						<h4>Why is the Tesla Cybertruck designed the way it is?</h4>
					</a>
					<p>
						The future can be scary, but there are ways to
						deal with that fear.
					</p>
					<div class="user">
						<img src="https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo"
						alt="user" />
						<div class="user-info">
							<h5>Eyup Ucmaz</h5>
							<small>Yesterday</small>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<img src="https://images6.alphacoders.com/312/thumb-1920-312773.jpg" alt="city" />
				</div>
				<div class="card-body">
					<span class="tag tag-pink">Design</span>
					<a href="#">
						<h4>Why is the Tesla Cybertruck designed the way it is?</h4>
					</a>
					<p>
						Dashboard Design Guidelines
					</p>
					<div class="user">
						<img src="https://studyinbaltics.ee/wp-content/uploads/2020/03/3799Ffxy.jpg" alt="user" />
						<div class="user-info">
							<h5>Carrie Brewer</h5>
							<small>1w ago</small>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<img src="https://images6.alphacoders.com/312/thumb-1920-312773.jpg" alt="city" />
				</div>
				<div class="card-body">
					<span class="tag tag-pink">Design</span>
					<a href="#">
						<h4>Why is the Tesla Cybertruck designed the way it is?</h4>
					</a>
					<p>
						Dashboard Design Guidelines
					</p>
					<div class="user">
						<img src="https://studyinbaltics.ee/wp-content/uploads/2020/03/3799Ffxy.jpg" alt="user" />
						<div class="user-info">
							<h5>Carrie Brewer</h5>
							<small>1w ago</small>
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