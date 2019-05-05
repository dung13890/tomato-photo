@if ($collections->count())
<section class="image-library-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="library-intro">
                    <h2 class="heading">{{ $category->collection_title }}</h2>
                    <p>{{ $category->collection_intro }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                <div class="library-gallery">
                    <div class="library-gallery-inner">
                        <div class="arrow">
                            <span>Click here</span>
                            <div class="curve"></div>
                            <div class="point"></div>
                        </div>
                        <ul id="lightgallery" class="list-unstyled row">
                            @foreach ($collections as $collection)
                            <li class="lightimage-{{ $loop->index }} col-xs-12" data-responsive="{{ $collection->pub_image }} 375, {{ $collection->pub_image }} 480, {{ $collection->pub_image }} 800" data-src="{{ $collection->pub_image }}">
                                <a href="javascript:void(0);">
                                    <img class="img-responsive" src="{{ $collection->pub_image }}" alt="{{ $collection->image_src }}">
                                    @if ($loop->first)
                                    <div class="library-gallery-poster">
                                        <img src="/statics/files/seeds/zoom.png">
                                    </div>
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
