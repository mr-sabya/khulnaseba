@extends('backend.layouts.base')

@section('title', 'Setting')

@section('content')
<div class="row">

	<div class="col-lg-12">
		<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="banner-tab" data-toggle="tab" data-target="#banner" type="button" role="tab" aria-controls="banner" aria-selected="true">Banner Section</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="about-tab" data-toggle="tab" data-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About Section</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Page</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="other-tab" data-toggle="tab" data-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">Other Page</button>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="banner" role="tabpanel" aria-labelledby="banner-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Banner Section</h4>

							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="{{ route('admin.setting.banner') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="banner_sub_heading">Sub Heading</label>
													<input type="text" class="form-control" name="banner_sub_heading" id="banner_sub_heading" value="{{ $setting->banner_sub_heading }}">
													@if($errors->has('banner_sub_heading'))
													<small style="color: red">{{ $errors->first('banner_sub_heading') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="banner_heading">Heading</label>
													<input type="text" class="form-control" name="banner_heading" id="banner_heading" value="{{ $setting->banner_heading }}">
													@if($errors->has('banner_heading'))
													<small style="color: red">{{ $errors->first('banner_heading') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="banner_text">Banner text</label>
													<textarea class="form-control" name="banner_text" id="banner_text">{{ $setting->banner_text }}</textarea>
													@if($errors->has('banner_text'))
													<small style="color: red">{{ $errors->first('banner_text') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group text-center">
													@if($setting->banner_image == null)
													<img src="{{ url('assets/backend/images/default_image.png')}}" id="bannerImgPreview" style="width: 300px;border: 1px solid #eaeaea;">
													@else
													<img src="{{ url('images/setting', $setting->banner_image)}}" id="bannerImgPreview" style="width: 300px;border: 1px solid #eaeaea;">
													@endif
												</div>

												<div class="form-group">
													<label for="banner_image">Image (1024*734px)</label>
													<input type="file" class="form-control" name="banner_image" id="banner_image">
													@if($errors->has('banner_image'))
													<small style="color: red">{{ $errors->first('banner_image') }}</small>
													@endif
												</div>
											</div>

										</div>

										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Banner Section</h4>

							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="{{ route('admin.setting.about') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="about_us_short_text">About us short text (for Home)</label>
													<textarea class="form-control details" name="about_us_short_text" id="about_us_short_text">{{ $setting->about_us_short_text }}</textarea>
													@if($errors->has('about_us_short_text'))
													<small style="color: red">{{ $errors->first('about_us_short_text') }}</small>
													@endif
													<small>Two paragraph and 700 characters</small>
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="about_us_text">About us text (for About Page)</label>
													<textarea class="form-control details" name="about_us_text" id="about_us_text">{!! $setting->about_us_text !!}</textarea>
													@if($errors->has('about_us_text'))
													<small style="color: red">{{ $errors->first('about_us_text') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group text-center">
													@if($setting->about_us_image == null)
													<img src="{{ url('assets/backend/images/default_image.png')}}" id="aboutImgPreview" style="width: 300px;border: 1px solid #eaeaea;">
													@else
													<img src="{{ url('images/setting', $setting->about_us_image)}}" id="aboutImgPreview" style="width: 300px;border: 1px solid #eaeaea;">
													@endif
												</div>

												<div class="form-group">
													<label for="about_us_image">Image (1024*734px)</label>
													<input type="file" class="form-control" name="about_us_image" id="about_us_image">
													@if($errors->has('about_us_image'))
													<small style="color: red">{{ $errors->first('about_us_image') }}</small>
													@endif
												</div>
											</div>

										</div>

										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Contact Page</h4>

							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="{{ route('admin.setting.contact') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="address">Address</label>
													<input type="text" class="form-control" name="address" id="address" value="{{ $setting->address }}">
													@if($errors->has('address'))
													<small style="color: red">{{ $errors->first('address') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="phone">Phone Number</label>
													<input type="text" class="form-control" name="phone" id="phone" value="{{ $setting->phone }}">
													@if($errors->has('phone'))
													<small style="color: red">{{ $errors->first('phone') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email" id="email" value="{{ $setting->email }}">
													@if($errors->has('email'))
													<small style="color: red">{{ $errors->first('email') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="contact_text">Contact text</label>
													<textarea class="form-control" name="contact_text" id="contact_text">{{ $setting->contact_text }}</textarea>
													@if($errors->has('contact_text'))
													<small style="color: red">{{ $errors->first('contact_text') }}</small>
													@endif
												</div>
											</div>
										</div>

										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Other Pages</h4>

							</div>
							<div class="card-body">
								<div class="basic-form">
									<form action="{{ route('admin.setting.page') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row">

											<div class="col-lg-12">
												<div class="form-group">
													<label for="copyright_text">Copyright Text</label>
													<input type="text" class="form-control" name="copyright_text" id="copyright_text" value="{{ $setting->copyright_text }}">
													@if($errors->has('copyright_text'))
													<small style="color: red">{{ $errors->first('copyright_text') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="help">Help Page</label>
													<textarea class="form-control details" name="help" id="help">{!! $setting->help !!}</textarea>
													@if($errors->has('about_us_short_text'))
													<small style="color: red">{{ $errors->first('help') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="terms_conditions">Terms and Condition Page</label>
													<textarea class="form-control details" name="terms_conditions" id="terms_conditions">{!! $setting->terms_conditions !!}</textarea>
													@if($errors->has('terms_conditions'))
													<small style="color: red">{{ $errors->first('terms_conditions') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="privacy_policy">Privacy and Policy Page</label>
													<textarea class="form-control details" name="privacy_policy" id="privacy_policy">{!! $setting->privacy_policy !!}</textarea>
													@if($errors->has('privacy_policy'))
													<small style="color: red">{{ $errors->first('privacy_policy') }}</small>
													@endif
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label for="about_khulna">About Khulna Page</label>
													<textarea class="form-control details" name="about_khulna" id="about_khulna">{!! $setting->about_khulna !!}</textarea>
													@if($errors->has('about_khulna'))
													<small style="color: red">{{ $errors->first('about_khulna') }}</small>
													@endif
												</div>
											</div>

										</div>

										<button type="submit" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
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
	$('#banner_image').change(function() {
		const file = this.files[0];
		console.log(file);
		if (file) {
			let reader = new FileReader();
			reader.onload = function(event) {
				console.log(event.target.result);
				$('#bannerImgPreview').attr('src', event.target.result);
			}
			reader.readAsDataURL(file);
		}
	});


	$('#about_us_image').change(function() {
		const file = this.files[0];
		console.log(file);
		if (file) {
			let reader = new FileReader();
			reader.onload = function(event) {
				console.log(event.target.result);
				$('#aboutImgPreview').attr('src', event.target.result);
			}
			reader.readAsDataURL(file);
		}
	});
</script>
@endsection