<!-- Sidebar -->
<?php $blogs = \App\Http\Controllers\CoreModules\Blog\BlogModel::where('is_active', 'yes')->orderBy('publish_date', 'DESC')->take(9)->get(); ?>
<div class="col-md-3">
    <aside class="sidebar">
        <div class="widget blog-widget">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#recentPosts" data-toggle="tab" aria-expanded="false">Recent</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="popularPosts">
                        <ul class="post-list">
                            @foreach($blogs as $b)
                            <li class="post">
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <a href="{{ route('blog', $b->slug) }}">
                                            <img src="{{ route('get-asset', ['blog', $b->asset]) }}" alt="{{ $b->title }}" width="50px" height="50px">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="{{ route('blog', $b->slug) }}">{{ $b->title }}</a>
                                    <div class="post-meta" style="color: black;">
                                       <p> {{ \App\Http\Controllers\HelperController::changeDateFormat($b->publish_date, 'Y-m-d') }}</p>
                                       <p><a href="{{ route('blogs') }}?{{urlencode('search[author]')}}={{ $b->author }}">By {{ $b->author }}</a></p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php $tags = \App\Http\Controllers\HelperController::getTagCloud(); ?>
        @if(count($tags))
        <div class="widget tags">
            @foreach($tags as $t)
            <a href="{{ route('blogs') }}?{{urlencode('search[tags]')}}={{ $t }}">{{ $t }}</a> 
            @endforeach
        </div>
        @endif
    </aside>
</div>