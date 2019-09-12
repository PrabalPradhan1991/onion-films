@extends('frontend.main')

@section('content')
    <!-- Page Header -->

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">Blog</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar Container  -->
    <section class="page-section padding-30">
        <div class="container">
        	<!-- Trigger the modal with a button -->
        	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="background-color: #006b64; border-color: #006b64">Search</button>

			<!-- Modal -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div id="myModal" class="modal fade" role="dialog">

			  	<div class="modal-dialog">
			  		<form>
				    <!-- Modal content-->
					    <div class="modal-content">
						    <div class="modal-header">
						     	<button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Search Criteria</h4>
						    </div>
					      	<div class="modal-body">
					        	<div class="form-group">
					        		<label>Author: </label>
					        		<input type="text" name="search[author]" class="form-control" @if(request()->input('search.author')) value="{{ request()->input('search.author') }}" @endif>
					        	</div>
					        	<div class="form-group">
					        		<label>Tags: </label>
					        		<input type="text" name="search[tags]" class="form-control" @if(request()->input('search.tags')) value="{{ request()->input('search.tags') }}" @endif>
					        	</div>
					        	<div class="form-group">
					        		<label>Start Date: </label>
					        		<input type="text" name="search[start_date]" class="date form-control" @if(request()->input('search.start_date')) value="{{ request()->input('search.start_date') }}" @endif>
					        	</div>
					        	<div class="form-group">
					        		<label>End Date: </label>
					        		<input type="text" name="search[end_date]" class="date form-control" @if(request()->input('search.end_date')) value="{{ request()->input('search.end_date') }}" @endif>
					        	</div>
					      	</div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-default">Search</button>
					      </div>
					    </div>
					</form>
				</div>
			</div>

			<br/>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
				$(function(){
					$('.date').datepicker({
						dateFormat: 'yy-mm-dd'
					})
				})
			</script>

            <div class="row">
                <!-- Content -->
                <div class="col-md-9">
                    <div class="blog-listing">
                        @foreach($blogs as $b)
                        <article>
                            <h2>{{ $b->title }}</h2>
                            <img class="img-thumbnail" src="{{ route('get-asset', ['blog', $b->asset]) }}" alt="{{ $b->title }}">
                            <h3>{{ $b->sub_title }}</h3>
                            <hr class="title-underline">
                            <p>
                               {!! nl2br($b->short_description) !!}
                            </p>
                            <div class="post-meta">
                            	<span><i class="fa fa-calendar"></i>{{ \App\Http\Controllers\HelperController::changeDateFormat($b->publish_date, 'Y-m-d') }}</span>
                            	<span><i class="fa fa-user"></i> By <a href="#">{{ $b->author }}</a> </span>
                            	<?php $tags = \App\Http\Controllers\HelperController::getTagCloud($b->tags); ?>
                            	@if(count($tags))
	                            	<span><i class="fa fa-tag"></i> 
	                                	@foreach($tags as $t)
	                                		<a href="{{ route('blogs') }}?search[tags]={{ $t }}">{{ $t }}</a>&nbsp;&nbsp; 
	                                	@endforeach
	                            	</span>
                            	@endif
                        	</div>
                        	<a href="{{ route('blog', $b->slug) }}" class="btn btn-xs btn-primary">Read more...</a>
                        </article>
                        @endforeach
                        {{ $blogs->appends(request()->all())->links() }}
                    </div>
                </div>
                @include('core-modules.blog.frontend.include.blog-side')
            </div>
        </div>
    </section>
@stop