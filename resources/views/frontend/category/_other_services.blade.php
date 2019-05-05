<section class="section-wrapper categories-wrapper">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="heading">OTHER SERVICES</h2>
        </div>
        <ul class="list-items row mt-5">
            @foreach ($services as $service)
            <li class="item col-sm-6 width50-flex">
                <div class="media row align-items-center">
                    <a class="col-lg-6" href="{{ route('category.show', $category->slug) }}">
                        <img src="{{ publicSrc($service->image_src) }}" alt="{{ $service->image_title }}" />
                    </a>
                    <div class="col-lg-6 media-body">
                        <a href="{{ route('category.show', $category->slug) }}">
                            <h3>{{ $service->name }}</h3>
                            <p>{{ $service->intro }}</p>
                            <p class="price">{{ $service->price }}</p>
                        </a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
