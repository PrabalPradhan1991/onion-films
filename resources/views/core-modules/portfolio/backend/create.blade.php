@extends('backend.main')

@section('content')

<style type="text/css">
	.subscriptionrequest{text-align: center; margin-top: 20px; }
	.subscriptionrequest h1{color:#0E4F88; font-size:36px; border-bottom: 2px #0E4F88 solid; padding-bottom: 10px;}
		.subscriptionrequest p{font-size: 16px; font-weight: bold;}

</style>

<div class="row sierra-row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<div class="d-flex align-items-center">
						<a href="{{ route('admin-portfolio-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Portfolios
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Create Portfolio</h3>
							{{-- <p>( List of users who pay by bank for the subscription appear here. confirm the payment and approve users )</p> --}}
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="title">Title</label>
							<input id="title" type="text" name="data[title]" class="form-control title" required value="{{ request()->old('data.title') }}">
							<span class="error-block">	@if($errors->has('title'))
								@foreach($errors->get('title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="client">Client</label>
							<input id="client" type="text" name="data[client]" class="form-control client" required value="{{ request()->old('data.client') }}">
							<span class="error-block">	@if($errors->has('client'))
								@foreach($errors->get('client') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="service_id">Service</label><br/>
							<div class="row" >
							@foreach(\App\Http\Controllers\CoreModules\Service\ServiceModel::orderby('service', 'ASC')->get() as $s)
								<div class="col-md-6">
									<input type="checkbox" name="service_id[]" value="{{ $s->id }}">{{ $s->service }}
								</div>
							@endforeach
							<div class="col-md-12 note">If none is selected, the project will be categorized as Uncategorized</div>
							</div>
						</div>

						<div class="form-group">
							{{--<label for="assets">Images</label>--}}
							<a class="add-asset btn btn-info" href="#"><i class="fas fa-plus-circle"></i>Add Image</a>
							<a class="add-video btn btn-info" href="#"><i class="fas fa-plus-circle"></i>Add Video</a>

							<div id="ajax-add-videos-element" style="display: none">
								
								<div class="row">
									<div class="col-md-5 col-sm-12">
										<label>Video Title</label>
										<input type="text" class="form-control video-title data-name" data-name="asset[asset_title][]">
										<span class="note">Please enter the youtube, vimeo embed</span>
									</div>
									<div class="col-md-5 col-sm-12">
										<label>Video Link</label>
										<input type="text" class="form-control video-link data-name" data-name="asset[file][]">
									</div>
									
									<div class="col-md-2 col-sm-12">
										<a href="#" class="btn btn-danger remove-asset"><i class="fas fa-times-circle"></i></a>
									</div>
									<input type="hidden" class="data-name" data-name="asset[type][]" value="video">
									<input type="hidden" class="data-name" data-name="asset[mime][]" value="">
								</div>
								
							</div>

							<div id="ajax-add-assets-element" style="display: none">
								<div class="row">
									<div class="col-md-5 col-sm-12">
										<div class="form-group">
											<label for="asset">Asset</label>
											<input type="file" accept="image/webp, image/jpg, image/png" class="prabal-asset">
											<input type="hidden" class="asset">
											<input type="hidden" class="mime">
											<input type="hidden" class="type">
											<img src=""/>
											<p></p>
											<div class="row">
												<div class="col-md-10">
													<div class="progress" style="display: flex;">
														<div class="progress-bar initial" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; opacity: 100;">
														</div>
													</div>
												</div>
											</div>
											
									
											<span class="error-block">
											</span>
										</div>
									</div>
									<div class="col-md-5 col-sm-12">
										<div class="form-group">
											<label for="asset_title">Title</label>
											<input type="text" class="form-control data-name" data-name="asset_title[]">
										</div>
									</div>
									
									<div class="col-md-2 col-sm-12">
										<a href="#" class="btn btn-danger remove-asset"><i class="fas fa-times-circle"></i></a>
									</div>
									
								</div>
							</div>
							<div id="ajax-add-assets">
								<input type="hidden" id="prabal-ajax-upload-image-csrf-token" value="{{ csrf_token() }}">												
								<input type="hidden" id="prabal-ajax-upload-image-directory" value="portfolio-assets">
								<input type="hidden" id="prabal-ajax-upload-image-loading-image" value="{{ asset('core/images/giphy.gif') }}">
								<input type="hidden" id="ajax-upload-asset-post" value="{{ route('ajax-upload-asset-post') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="portfolio_date">Date</label>
							<input id="portfolio_date" type="text" name="data[portfolio_date]" class="date form-control portfolio_date" required value="{{ request()->old('data.portfolio_date') }}">
							<span class="error-block">	@if($errors->has('portfolio_date'))
								@foreach($errors->get('portfolio_date') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="website">Website</label>
							<input id="website" type="text" name="data[website]" class="form-control website" value="{{ request()->old('data.website') }}">
							<span class="error-block">	@if($errors->has('website'))
								@foreach($errors->get('website') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="short_description">Short Description</label>
							<textarea name="data[short_description]" class="form-control" rows="5">{{ request()->old('data.short_description') }}</textarea>
							
							<span class="error-block">	@if($errors->has('short_description'))
								@foreach($errors->get('short_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="long_description">Long Description</label>
							<textarea name="data[long_description]" class="form-control" rows="5">{{ request()->old('data.long_description') }}</textarea>
							
							<span class="error-block">	@if($errors->has('long_description'))
								@foreach($errors->get('long_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="ordering">Ordering</label>
							<input id="ordering" type="number" name="data[ordering]" step=1 min=0 class="form-control ordering" value="{{ \App\Http\Controllers\HelperController::getOrdering('\App\Http\Controllers\CoreModules\Portfolio\PortfolioModel', 'ordering') }}" required>
							@if($errors->has('ordering'))
								@foreach($errors->get('ordering') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
						</div>


					</div>	
				</div>
			{{ csrf_field() }}
				<div class="card-action">
					<div class="col-sm-5">				
						<button type="submit" class="btn btn-success">Submit</button>
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>	
@stop

@section('custom-js')
	<script>
		$(document).on('click', '.add-asset', function(e){
			e.preventDefault()
			let html = $('#ajax-add-assets-element').html();
			$('#ajax-add-assets').append(html)
			$('#ajax-add-assets').find('.data-name').each(function(){
				if(!(this).hasAttribute("name")) {
					$(this).attr('name', 'asset[asset_title][]')
					$(this).attr('required', 'required')
				}
			})
		})

		$(document).on('click', '.add-video', function(e){
			e.preventDefault()
			let html = $('#ajax-add-videos-element').html();
			$('#ajax-add-assets').append(html)
			$('#ajax-add-assets').find('.data-name').each(function(){
				if(!(this).hasAttribute("name")) {
					$(this).attr('name', $(this).attr('data-name'))
					$(this).attr('required', 'required')
				}
			})
		})

		$(document).on('click', '.remove-asset', function(e){
			e.preventDefault()
			$(this).parent().parent().remove()
		})

		$('#ajax-add-assets').on('change', 'input[type="file"]', function(e)
		{
				var formData = new FormData;
				var files = e.target.files;
				var current_element = this;
				let count = files.length
				//current_element.parentElement.getElementsByClassName('error-block')[0].innerHTML = ''

				var formData = new FormData;

				formData.append('file', files[0])
				formData.append('_token', $('#prabal-ajax-upload-image-csrf-token').val())
				formData.append('directory', 'portfolio-asset')
				formData.append('asset_type', 'image')
				$(current_element).hide();
				$(current_element).parent().find('img').attr('src', $('#prabal-ajax-upload-image-loading-image').val());
				assetAjax(this.parentElement, formData);
					
				
		})

		function assetAjax(current_element, formData)
		{
			var c = $(current_element)
			//c.find('img').hide()
			//current_element.style.background = loadingBackground
			$.ajax(
			{
				url: $('#ajax-upload-asset-post').val(), // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				xhr: function() {
		                var myXhr = $.ajaxSettings.xhr();
		                if(myXhr.upload){
		                    myXhr.upload.addEventListener('progress',progress.bind(null, current_element), false);
		                }
		                return myXhr;
		        },
				success: function(data)   // A function to be called if request succeeds
				{
					if(data.status == true)
					{
						//$('#loading_image').html('<p>' + 'Images successfully uploaded' + '</p>');
						var images = '';
						var image_src = data.url;
						var image_name = data.filename;

						$(current_element).find('img').remove()
						$(current_element).find('p').html(data.original_filename)
						$(current_element).find('input[class="asset"]').val(data.filename)
						$(current_element).find('input[class="asset"]').attr('name', 'asset[file][]')
						$(current_element).find('input[class="mime"]').attr('name', 'asset[mime][]')
						$(current_element).find('input[class="mime"]').val(data.mime_type)
						$(current_element).find('input[class="type"]').attr('name', 'asset[type][]')
						$(current_element).find('input[class="type"]').val('image')
						//$(current_element).parent().find('.data-name').attr('name', 'asset_title[]')

						current_element.parentElement.classList.add('uploaded_asset')
						progressComplete(current_element)
					}	
					else
					{
						//c.find('img').show()
						var error_html = '';
						error_html += '<p>' + data.message + '</p>';

						$.each(data.data, function(key, value)
						{
							error_html += '<p>' + value + '</p>';
						});
						current_element.parentElement.getElementsByClassName('error-message')[0].innerHTML = error_html
						current_element.style.background = uploadBackground


						//$(form_element).parent().find('.error-message').html(error_html);
					}
				},
				error: function(request, status, error) {
			        console.log(request);
			        console.log(error);
			        console.log(status);
			    }
			});
		}

		function progress(i, e)
		{
			//console.log(i.innerHTML)
			i.parentElement.getElementsByClassName('progress')[0].style.display = 'flex'
			if(e.lengthComputable){
		        var max = e.total;
		        var current = e.loaded;

		        //i.classList.remove("clean");
		        //i.classList.remove("fa-cloud-upload");

		        var Percentage = parseInt((current * 100)/max);

		        var max = e.total;
		        var current = e.loaded;

		        var Percentage = parseInt((current * 100)/max);

		        if(Percentage >= 95)
		        {
		        	Percentage = 95


		        }

		        var jquery_element = $(i);
		        jquery_element.animate({
					"value": Percentage + "%"
					}, 
					{
					duration: 600,
					easing: 'linear'
				});
		        
		        //if(Percentage 105)
		        //{

			        for(var j=i.parentElement.getElementsByClassName('progress-bar')[0].getAttribute('aria-valuenow'); j<=Percentage; j++)
			        {
		        		//console.log(j)
		        		i.parentElement.getElementsByClassName('progress-bar')[0].style.width = j + '%'
		        		i.parentElement.getElementsByClassName('progress-bar')[0].setAttribute('aria-valuenow', j)

			        }	
		        //}
		          
		        
			}
		}

		function progressComplete(i)
		{
			var Percentage = 100;
			i.parentElement.getElementsByClassName('progress-bar')[0].style.width = Percentage + '%'
			i.parentElement.getElementsByClassName('progress-bar')[0].setAttribute('aria-valuenow', Percentage)	
			i.parentElement.getElementsByClassName('progress-bar')[0].classList.add("bg-success");
		    //i.parentElement.getElementsByClassName('progress')[0].style.display = 'none'
		}
	</script>
@stop