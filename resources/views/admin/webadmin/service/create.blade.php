@extends('layouts.app')

	<!--Summernote css-->
	@section('css')

		<link href="{{ asset('vendor-admin/summernote/summernote.css') }}" rel="stylesheet">

	@endsection
	<!--End-->

	@section('layoutRole')

		@include('layouts.webadmin.nav')

	@endsection

	@section('content')
		
		<div class="container">
			<form action="{{ route('webadmin.service.store') }}" method="post" enctype="multipart/form-data">
				
				{{ csrf_field() }}

				<div class="col-md-8" style="margin-top: 30px !important;">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								Section 1
								<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
							</h3>
						</div>

						<div class="panel-body">

							<div class="form-group {{ $errors->has('intro') ? 'has-error' : '' }}">
				    			<label for="intro">Introduction</label>
				    			<textarea name="intro" id="service-intro" class="form-control summernote" cols="3" rows="3"></textarea>

				    			@if($errors->has('intro'))

					    			<div class="text-danger">
										Please insert introduction of service
									</div>

								@endif

				    		</div>

				    		<div class="col-md-4">
								<div class="form-group {{ $errors->has('intro_image') ? 'has-error' : '' }}">
									<label for="intro_image">Image: Introduction</label>
									<input type="file" name="intro_image" class="form-control">

									@if($errors->has('intro_image'))

						    			<div class="text-danger">
											Please upload any relevant image
										</div>

									@endif

								</div>
							</div>

						</div>

					</div>
				</div>

				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								Section 2
								<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
							</h3>
						</div>
							
						<div class="panel-body">

							<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
				    			<label for="body">Body</label>
				    			<textarea name="body" id="service-body" class="form-control summernote" cols="3" rows="3"></textarea>

				    			@if($errors->has('body'))

					    			<div class="text-danger">
										Please insert any relevant content about services
									</div>

								@endif

				    		</div>

				    		<div class="col-md-4">
								<div class="form-group {{ $errors->has('body_image') ? 'has-error' : '' }}">
									<label for="body_image">Image: Body</label>
									<input type="file" name="body_image" class="form-control">

									@if($errors->has('body_image'))

						    			<div class="text-danger">
											Please upload any relevant image
										</div>

									@endif
								
								</div>
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

	<!--Summernote JS-->
	@section('script')

		@include('includes.summernote')

		<script>
			loadTextEditor('about');
		</script>

	@endsection
	<!--End-->