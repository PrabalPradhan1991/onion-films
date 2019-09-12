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
						<a href="{{ route('admin-blog-list') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Blogs
						</a>
					</div>	
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="subscriptionrequest">
							<h3>Edit {{ $data->title }}</h3>
						</div>	
					</div>		
				</div>
			</div>
			<form method="post" enctype="multipart/form-data" class="submit-once">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="title">Title</label>
							<input id="title" type="text" name="data[title]" class="form-control title" required value="{{ $data->title }}">
							<span class="error-block">	@if($errors->has('title'))
								@foreach($errors->get('title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="sub_title">Sub Title</label>
							<input id="sub_title" type="text" name="data[sub_title]" class="form-control sub_title" required value="{{ $data->sub_title }}">
							<span class="error-block">	@if($errors->has('sub_title'))
								@foreach($errors->get('sub_title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<img src="{{ route('get-asset', ['blog', $data->asset]) }}" height="150px">
							<label for="asset">Main Image</label>
							<input type="file" name="data[asset]" accept="image/png, image/webp, image/jpeg">
							<span class="error-block">	@if($errors->has('asset'))
								@foreach($errors->get('asset') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="short_description">Short Description</label>
							<textarea name="data[short_description]" class="form-control" rows="5">{{ str_replace("<br />", "\n", $data->short_description) }}</textarea>
							
							<span class="error-block">	@if($errors->has('short_description'))
								@foreach($errors->get('short_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="long_description">Long Description</label>
							<textarea name="data[long_description]" class="form-control summernote" rows="5">{!! $data->long_description !!}</textarea>
							
							<span class="error-block">	@if($errors->has('long_description'))
								@foreach($errors->get('long_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="tags">Tags</label>
							<input id="tags" type="text" name="data[tags]" class="form-control tags" required value="{{ $data->tags }}">
							<span class="error-block">	@if($errors->has('tags'))
								@foreach($errors->get('tags') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="author">Author</label>
							<input id="author" type="text" name="data[author]" class="form-control author" required value="{{ $data->author }}">
							<span class="error-block">	@if($errors->has('author'))
								@foreach($errors->get('author') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="publish_date">Publish Date</label>
							<input id="publish_date" type="text" name="data[publish_date]" class="date form-control publish_date" required value="{{ $data->publish_date }}">
							<span class="error-block">	@if($errors->has('publish_date'))
								@foreach($errors->get('publish_date') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="is_active">Publish</label>
							<select name="data[is_active]" class="form-control" required>
								<option value="">-- Select --</option>
								<option value="yes" @if($data->is_active == 'yes') selected @endif>Yes</option>
								<option value="no" @if($data->is_active == 'no') selected @endif>No</option>
							</select>
						</div>

						<div class="form-group">
							<label for="seo_title">SEO Title</label>
							<input id="seo_title" type="text" name="data[seo_title]" class="form-control seo_title" value="{{ $data->seo_title }}">
							<span class="error-block">	@if($errors->has('seo_title'))
								@foreach($errors->get('seo_title') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="seo_keywords">SEO Keywords</label>
							<input id="seo_keywords" type="text" name="data[seo_keywords]" class="form-control seo_keywords" value="{{ $data->seo_keywords }}">
							<span class="error-block">	@if($errors->has('seo_keywords'))
								@foreach($errors->get('seo_keywords') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						<div class="form-group">
							<label for="seo_description">SEO Description</label>
							<textarea id="seo_description" type="text" name="data[seo_description]" class="form-control seo_description" rows="5">{{ $data->seo_description }}</textarea>
							<span class="error-block">	@if($errors->has('seo_description'))
								@foreach($errors->get('seo_description') as $e)
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
<input type="hidden" id="prabal-ajax-upload-image-directory" value="blogs">
<input type="hidden" id="prabal-ajax-upload-image-asset-type" value="blogs">
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