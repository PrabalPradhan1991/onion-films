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
							<i class="fa fa-plus"></i>
							 List Portfolios
						</a>
					</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="subscriptionrequest">
						<h1>Assets of {{ $portfolio->title }}</h1>
					</div>	
				</div>		
			</div>

			<div class="card-body">
				@if(!empty($data))
				<form method="post" action="{{ route('admin-portfolio-asset-edit-post', $portfolio->id) }}" id="submit-once">
					<div class="table-responsive">
						<table id="add-row" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 10px">Sn</th>
									<th>Title</th>
									<th>Type</th>
									<th>Ordering</th>
									<th style="width: 100px">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $index => $d)
									<tr>
										<td>{{ $index + 1 }}</td>
										<td><input type="text" name="data[{{ $d->id }}][title]" value="{{ $d->title }}"></td>
										<td>{{ $d->type }}</td>
										<td><input type="number" step=1 name="data[{{ $d->id }}][ordering]" value="{{ $d->ordering }}"></td>
										<td>
											<div class="form-button-action">
												<a href="#" title="Delete" class="a_submit_button btn btn-danger" data-original-title="Delete" related-id="delete-{{ $d->id }}">
													<i class="fa fa-trash"></i>
												</a>
											</div>			
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ csrf_field() }}
						<input type="submit" class="btn btn-success" value="Edit">
					</div>
				</form>

				@foreach($data as $index => $d)
					<form method="post" action="{{ route('admin-portfolio-asset-delete-post', $d->id) }}" class="prabal-confirm" id="delete-{{$d->id}}">
						{{ csrf_field() }}
					</form>
				@endforeach
				@else
					<div class="row">
						<div class="col-md-12">
							No data found
						</div>
					</div>
				@endif

				<form method="post" action="{{ route('admin-portfolio-asset-add-post', $portfolio->id) }}">
					<div class="row">
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
					</div>
					{{ csrf_field() }}
					<br/>
					<input type="submit" class="btn btn-success btn-flat" value="Add Asset">
				</form>
			</div>
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