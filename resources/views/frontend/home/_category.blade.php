<section class="section-wrapper categories-wrapper bg-grey">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="heading">Our products</h2>
        </div>

        <ul class="list-items row mt-5 wow zoomIn">
            @foreach ($categories as $category)
            <li class="item col-md-4 col-sm-6">
                <div class="media row align-items-center">
                    <a class="col-lg-12" href="#">
                        <img src="{{ publicSrc($category->image_src) }}" alt="{{ $category->name }}" />
                    </a>
                    <div class="col-lg-12 media-body">
                        <a href="#">
                            <h3>{{ $category->name }}</h3>
                        </a>
                        <p>{{ str_limit($category->description, 250) }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
