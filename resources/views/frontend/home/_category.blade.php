<section class="section-wrapper categories-wrapper bg-grey">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="heading">Our products</h2>
        </div>

        <ul class="list-items row mt-5 wow zoomIn">
            @foreach ($categories as $category)
            <li class="item col-md-4 col-sm-6">
                <div class="item-inner shadow-sm">
                    <a class="d-block" href="{{ route('category.show', $category->slug) }}">
                        <img src="{{ publicSrc($category->image_src) }}" alt="{{ $category->name }}" />
                    </a>
                    <div class="item-content p-4">
                        <a href="{{ route('category.show', $category->slug) }}">
                            <h3>{{ $category->name }}</h3>
                        </a>
                        <p>{{ str_limit($category->description, 150) }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
