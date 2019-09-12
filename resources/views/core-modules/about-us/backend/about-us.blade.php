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
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Contact Us</h3>
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
							<input type="text" id="title" name="data[title]" class="form-control title" value="{{ $data->title }}">
							<span class="error-block">	@if($errors->has('title'))
								@foreach($errors->get('title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							@if($data->asset)
								<img src="{{ route('get-asset', ['about-us', $data->asset]) }}" height="150px">
							@endif
							<label for="asset">Image</label>
							<input type="file" id="asset" name="data[asset]" class="form-control asset" accept="image/jpg, image/webp, image/png">
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea id="description" type="text" name="data[description]" class="summernote form-control description">{!! $data->description !!}</textarea>
							<span class="error-block">	@if($errors->has('description'))
								@foreach($errors->get('description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
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
<input type="hidden" id="prabal-ajax-upload-image-post" value="{{ route('ajax-upload-image-post') }}">
<input type="hidden" id="prabal-ajax-upload-image-directory" value="about-us">
<input type="hidden" id="prabal-ajax-upload-image-asset-type" value="about-us">
<input type="hidden" id="prabal-ajax-upload-set-sizes" value="no">		
@stop


@section('custom-js')
	
	<script src="{{ asset('core/tinymce/js/tinymce/tinymce.min.js') }}"></script>
	<script>
	tinymce.init({
	  selector: 'textarea.summernote',
	  document_base_url : "{{ config()->get('app.url') }}",
	  plugins: 'print preview powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter permanentpen pageembed tinycomments mentions linkchecker',
  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
  image_advtab: true,
	    height : 480,
	    style_formats: [
	    {
        title: 'Image Left',
        selector: 'img',
        styles: {
            'float': 'left', 
            'margin': '0 10px 0 10px'
        }
     },
     {
         title: 'Image Right',
         selector: 'img', 
         styles: {
             'float': 'right', 
             'margin': '0 0 10px 10px'
         }
     }],
    	images_upload_handler: function (blobInfo, success, failure) {
	    	data = new FormData();
	        data.append("image", blobInfo.blob());
	        data.append('directory', $('#prabal-ajax-upload-image-directory').val())
			data.append('asset_type', $('#prabal-ajax-upload-image-asset-type').val())
			data.append('set-sizes', $('#prabal-ajax-upload-set-sizes').val())
	        data.append("_token", $('input[name="_token"]').val())
	        $.ajax({
	            data: data,
	            type: 'POST',
	            xhr: function() {
	                var myXhr = $.ajaxSettings.xhr();
	                if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
	                return myXhr;
	            },
	            url: $('#prabal-ajax-upload-image-post').val(),
	            cache: false,
	            contentType: false,
	            processData: false,
	            success: function(url) {
	            	console.log(url)
	            	//$('.summernote').summernote('insertImage', url.url);
	            	success(url.url);
	                //editor.insertImage(welEditable, url);
	            },
		        error: function(data) {
		            console.log(data)
		        }
	        });
  }

  
	});

	function progressHandlingFunction(e){
	    if(e.lengthComputable){
	        $('progress').attr({value:e.loaded, max:e.total});
	        // reset progress on complete
	        if (e.loaded == e.total) {
	            $('progress').attr('value','0.0');
	        }
	    }
	}

</script>

@stop