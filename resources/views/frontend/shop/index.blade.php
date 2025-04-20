@extends('frontend.layouts.base')

@section('title', 'Shop')

@section('content')

<!-- hero section start -->
<div class="header">
    <div class="container">
        <h2>Shop</h2>
    </div>
</div>
<!-- hero section end -->


<!-- newspaper section start -->
<div class="blood-section section-padding">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-10">
                <!-- filter form -->
                <div class="filter mb-4">

                    <form action="{{ route('shop.search')}}" method="post">
                        @csrf
                        @method('GET')
                        <div class="row g-2">
                            <div class="col-lg-2 d-flex align-items-center">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#locationModal" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span id="location">All Bangladesh</span>
                                </a>
                                <input type="hidden" name="city_id" id="city_id">
                            </div>

                            <div class="col-lg-2">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">All category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="search" class="form-control" placeholder="search here....">
                            </div>


                            <div class="col-lg-2">
                                <button class="btn form-btn custom-btn"><i class="fa-solid fa-arrow-down-wide-short"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-5">

            @foreach($categories as $category)
            <div class="col-lg-2">
                <div class="card p-0 h-100">
                    <div class="image bg-dark h-100 d-flex align-items-center">
                        <a href="#">
                            <img src="{{ url('images/shop-category', $category->image) }}" alt="">
                        </a>
                    </div>

                    <div class="text p-2 text-center">
                        <a href="#">
                            <div class="info ">
                                <h4 style="font-size: 16px;">{{ $category->name }} <br> <small class="text-success">{{ $category->shops->count() }} Shops</small></h4>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

       

        <div class="row g-3">
            @if($shops->count() > 0)
            @foreach($shops as $shop)
            <div class="col-lg-4">
                <div class="card p-0 h-100">


                    <div class="text p-4 pb-0">
                        <div class="info ">
                            <h4>{{ $shop->name }}</h4>
                        </div>
                        <div class="phone">
                            <p>{{ $shop->phone }}</p>
                            <p>{{ $shop->address }}</p>
                            <p>
                                @if($shop->city)
                                {{ $shop->city['name'] }},
                                @endif
                                @if($shop->district)
                                {{ $shop->district['name'] }}
                                @endif
                            </p>
                            <P class="mt-3"><strong>Type : {{ $shop->shopCategory['name'] }}</strong></P>
                            <p>

                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="call-button text-center pb-3">
                        <a class="call-btn" href="#"><i class="fa-solid fa-phone"></i> Call</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>No Shops Found!</h4>
                </div>
            </div>
            @endif
        </div>

        <div class="mt-30">
            {{ $shops->links() }}
        </div>

    </div>
</div>
<!-- newspaper section end -->

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select Location</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Select District"></label>
                            <select name="" id="district" class="form-control">
                                <option value="0" selected>All District</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h5>Cities: </h5>
                        <div class="row" id="city_div">


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $('#district').change(function() {
        var id = $(this).val();

        if (id == 0) {
            $('#location').html("All Bangladesh");
            $('#locationModal').modal('hide');
        } else {
            $.ajax({
                url: "/get-city/" + id,
                dataType: "json",
                success: function(data) {
                    $('#city_div').html(data.data);
                }
            })
        }


    })


    $(document).on('click', '.city', function() {
        var name = $(this).attr('data-value');
        var id = $(this).attr('data-id');

        $('#location').html(name);
        $('#city_id').val(id);

        $('#locationModal').modal('hide');
    });
</script>
@endsection