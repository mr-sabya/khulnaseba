@extends('backend.layouts.base')

@section('title', 'Add Namaz Time')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add Namaz Time</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-form">
					<form action="{{ route('admin.namaz.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="hijri_date">হিজরি তারিখ</label>
							<input type="text" class="form-control" name="hijri_date" id="hijri_date" value="{{ old('hijri_date') }}" placeholder="২ রবিউল আউয়াল, ১৪৪৫">
							@if($errors->has('hijri_date'))
							<small style="color: red">{{ $errors->first('hijri_date') }}</small>
							@endif
						</div>
						<div class="form-group">
							<label for="date">তারিখ</label>
							<input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}">
							@if($errors->has('date'))
							<small style="color: red">{{ $errors->first('date') }}</small>
							@endif
						</div>

						<div class="form-group">
							<label for="division_id">Division</label>
							<select class="form-control single-select" id="division_id" name="division_id">
								<option value="" selected disabled>--select division--</option>
								@foreach($divisions as $division)
								<option value="{{ $division->id }}">{{ $division->name }}</option>
								@endforeach
							</select>
							@if($errors->has('division_id'))
							<small style="color: red">{{ $errors->first('division_id') }}</small>
							@endif
						</div>


                        <div class="form-group">
							<label for="tahajjud">তাহাজ্জুদ</label>
							<input type="text" class="form-control" name="tahajjud" id="tahajjud" value="{{ old('tahajjud') }}" placeholder="৪:২৯ AM">
							@if($errors->has('tahajjud'))
							<small style="color: red">{{ $errors->first('tahajjud') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="fojr">ফজর</label>
							<input type="text" class="form-control" name="fojr" id="fojr" value="{{ old('fojr') }}" placeholder="৪:২৯ AM">
							@if($errors->has('fojr'))
							<small style="color: red">{{ $errors->first('fojr') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="sun_rise">সূর্যোদয়</label>
							<input type="text" class="form-control" name="sun_rise" id="sun_rise" value="{{ old('sun_rise') }}" placeholder="৪:২৯ AM">
							@if($errors->has('sun_rise'))
							<small style="color: red">{{ $errors->first('sun_rise') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="ishraq">ইশরাক, চাশত</label>
							<input type="text" class="form-control" name="ishraq" id="ishraq" value="{{ old('ishraq') }}" placeholder="৪:২৯ AM">
							@if($errors->has('ishraq'))
							<small style="color: red">{{ $errors->first('ishraq') }}</small>
							@endif
						</div>

                        
                        <div class="form-group">
							<label for="noon">দ্বিপ্রহর</label>
							<input type="text" class="form-control" name="noon" id="noon" value="{{ old('noon') }}" placeholder="৪:২৯ AM">
							@if($errors->has('noon'))
							<small style="color: red">{{ $errors->first('noon') }}</small>
							@endif
						</div>
                        
                        <div class="form-group">
							<label for="johor">যুহুর, যাওয়াল</label>
							<input type="text" class="form-control" name="johor" id="johor" value="{{ old('johor') }}" placeholder="৪:২৯ AM">
							@if($errors->has('johor'))
							<small style="color: red">{{ $errors->first('johor') }}</small>
							@endif
						</div>
                        
                        <div class="form-group">
							<label for="asor">আসর </label>
							<input type="text" class="form-control" name="asor" id="asor" value="{{ old('asor') }}" placeholder="৪:২৯ AM">
							@if($errors->has('asor'))
							<small style="color: red">{{ $errors->first('asor') }}</small>
							@endif
						</div>
                        
                        <div class="form-group">
							<label for="sun_set">সূর্যাস্ত </label>
							<input type="text" class="form-control" name="sun_set" id="sun_set" value="{{ old('sun_set') }}" placeholder="৪:২৯ AM">
							@if($errors->has('sun_set'))
							<small style="color: red">{{ $errors->first('sun_set') }}</small>
							@endif
						</div>
                        
                        <div class="form-group">
							<label for="magrib">মাগরিব, ইফতার</label>
							<input type="text" class="form-control" name="magrib" id="magrib" value="{{ old('magrib') }}" placeholder="৪:২৯ AM">
							@if($errors->has('magrib'))
							<small style="color: red">{{ $errors->first('magrib') }}</small>
							@endif
						</div>

                        <div class="form-group">
							<label for="isha">ইশা</label>
							<input type="text" class="form-control" name="isha" id="isha" value="{{ old('isha') }}" placeholder="৪:২৯ AM">
							@if($errors->has('isha'))
							<small style="color: red">{{ $errors->first('isha') }}</small>
							@endif
						</div>

						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

@endsection