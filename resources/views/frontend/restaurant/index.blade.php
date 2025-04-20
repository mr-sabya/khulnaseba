@extends('frontend.layouts.base')

@section('title', 'Restaurant')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Restaurant</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">


        <div class="row justify-content-center mb-5">

            <div class="col-lg-12">
                <div class="filter ">
                    <form action="{{ route('restaurant.search') }}" method="post">
                        @csrf
                        @method('GET')
                        <div class="row g-2">
                            <div class="col-lg-2">
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">All Bangladesh</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-2">
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">All City</option>
                                </select>
                            </div>

                            <div class="col-lg-2">
                                <select name="food_id" id="food_id" class="form-control">
                                    <option value="">All Types</option>
                                    @foreach($foods as $food)
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <input type="text" name="search" class="form-control" placeholder="search here....">
                            </div>


                            <div class="col-lg-2">
                                <button type="submit" class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <div class="row g-3 mb-5">
            <h4>Foods</h4>
            <hr>
            @foreach($foods as $food)
            <div class="col-lg-2">
                <div class="card p-0 h-100">
                    <div class="image bg-dark h-100 d-flex align-items-center">
                        <a href="{{ route('restaurant.show', $food->slug)}}">
                            <img src="{{ url('images/food', $food->image) }}" alt="">
                        </a>
                    </div>

                    <div class="text p-2 text-center">
                        <a href="{{ route('restaurant.show', $food->slug)}}">
                            <div class="info ">
                                <h4 style="font-size: 16px;">{{ $food->name }} <br> <small class="text-success">{{ $food->restaurants->count() }} Restaurants</small></h4>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>



        <div class="row g-3">
            <h4>Restaurants</h4>
            <hr>

            @if($restaurants->count()>0)
            @foreach($restaurants as $restaurant)
            <div class="col-lg-3">
                <div class="card p-0 h-100">
                    <div class="image d-flex align-items-center" style="height: 205px; overflow: hidden;">
                        @if($restaurant->image == null)
                        <img src="{{ url('assets/frontend/image/default_image.png') }}" alt="">
                        @else
                        <img src="{{ url('images/food', $restaurant->image) }}" alt="">
                        @endif
                    </div>

                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $restaurant->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $restaurant->phone }}</p>
                            <p>{{ $restaurant->address }}</p>
                            <p>
                                @if($restaurant->city)
                                {{ $restaurant->city['name'] }},
                                @endif
                                @if($restaurant->district)
                                {{ $restaurant->district['name'] }}
                                @endif
                            </p>
                            <P class="mt-3"><strong>Foods : </strong></P>
                            <p>
                                @foreach($restaurant->foods as $food)
                                <span class="badge bg-info">{{ $food->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="call-button text-center pb-3">
                        <a class="call-btn" href="tel:{{ $restaurant->phone }}"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
			<div class="col-lg-12">
				<div class="text-center">
					<h4>No Restaurants Found!</h4>
				</div>
			</div>
			@endif
        </div>

        <div class="mt-30">
            {{ $restaurants->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

@endsection


@section('scripts')
<script>
    $('#district_id').change(function() {
        $('#city_id').html('');
        var id = $(this).val();
        $.ajax({
            url: "/get-city-option/" + id,
            dataType: "json",
            success: function(data) {
                $('#city_id').append(data.data);
            }
        })
    })
</script>
@endsection