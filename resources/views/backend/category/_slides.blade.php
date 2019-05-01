<a class="btn btn-default" target="_blank" href="{{ route('backend.slide.create') }}"><i class="ion-edit"></i> {{ __('repositories.title.edit')  }}</a>
@if ($slides->count())
<div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($slides as $slide)
        <div class="item @if ($loop->first) active @endif">
            <img src="{{ publicSrc($slide->image_src) }}" alt="{{ $slide->image_src }}" class="img-responsive">
        </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif
