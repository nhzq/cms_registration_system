@extends('layouts.app')

	@section('layoutRole')

		@include('layouts.systemadmin.nav')

	@endsection

	@section('css')

		<link href="{{ asset('vendor-admin/datepicker/gijgo.css') }}" rel="stylesheet" type="text/css" />

	@endsection

	@section('content')
		
		<div class="container">
			<form action="{{ route('systemadmin.training.update', ['id' => $training->id]) }}" method="post" enctype="multipart/form-data">
				
				{{ csrf_field() }}

				<div class="col-md-8" style="margin-top: 30px !important;">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								Add Training Details
								<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
							</h3>
						</div>

						<div class="panel-body">

				    		<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
				    			<label for="category">Please select category</label>
				    			<select name="category_id" id="category" class="form-control">

				    				@foreach($cats as $cat)
										
										<option value="{{ $cat->id }}" {{ $training->category->id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>

				    				@endforeach

				    			</select>

				    			@if($errors->has('category_id'))

					    			<div class="text-danger">
										Please select a category before save
									</div>

								@endif

				    		</div>

				    		<div class="form-group {{ $errors->has('subcategory_id') ? 'has-error' : '' }}">
				    			<label for="subcategory">Please select subcategory</label>
				    			<select name="subcategory_id" id="subcategory" class="form-control">
				    			</select>

				    			@if($errors->has('subcategory_id'))

					    			<div class="text-danger">
										Please select a subcategory before save
									</div>

								@endif

				    		</div>

				    		<div class="col-md-6" style="padding-left: 0px;">
					    		<div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
					    			<label for="start date">Please choose start date</label>
					    			<input id="datepicker" name="start_date" value="{{ $training->start_date->format('m/d/Y') }}">

					    			@if($errors->has('start_date'))

						    			<div class="text-danger">
											Please choose training's start date before save
										</div>

									@endif

					    		</div>
							</div>		
					    	<div class="col-md-6" style="padding-right: 0px;">
					    		<div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
					    			<label for="end date">Please choose end date</label>
					    			<input id="datepicker2" name="end_date" value="{{ $training->end_date->format('m/d/Y') }}">

					    			@if($errors->has('end_date'))

						    			<div class="text-danger">
											Please choose training's end date before save
										</div>

									@endif

					    		</div>
							</div>
				    		
				    		<div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
				    			<label for="slocation">Please select venue</label>
				    			<select name="location_id" id="location" class="form-control">
				    				<option value="">Choose one</option>

				    					@foreach($locations as $location)
										
											<option value="{{ $location->id }}" {{ $training->location->id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>

										@endforeach
		
				    			</select>

				    			@if($errors->has('location_id'))

					    			<div class="text-danger">
										Please select training's venue before save
									</div>

								@endif
								
				    		</div>

						</div>

					</div>
				</div>

				<div class="col-md-8" style="margin-bottom: 30px !important;">
					<button class="btn btn-success pull-right" type="submit">
						Save
					</button>
				</div>

				

			</form>
	    </div>

	@endsection

	@section('script')

		<script src="{{ asset('vendor-admin/datepicker/gijgo.js') }}"></script>

		<script>

			$(function() {
				$('#datepicker').datepicker({
					uiLibrary: 'bootstrap4',
					iconsLibrary: 'fontawesome'
				});

				$('#datepicker2').datepicker({
					uiLibrary: 'bootstrap4',
					iconsLibrary: 'fontawesome'
				});
			});

			$('#category').on('click', function() {

				var cat_id = $(this).val();
				var op = " ";

				$.ajax({
					type:'GET',
					url:'{{ route('training.subcat') }}',
					data: {'id':cat_id},
					success:function(data) {

						op = op + '<option value="">Choose one</option>';

						for(var i = 0; i < data.length; i++) {

							op = op + '<option value="' + data[i].id + '">' + data[i].name + '</option>'; 
							
						}
						
						$('#subcategory').html(" ");
						$('#subcategory').append(op);

					},
					error:function() {
						console.log("There is an error with your AJAX");
					}
				});

			});

		</script>

	@endsection