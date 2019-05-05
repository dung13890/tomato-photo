<section class="section-wrapper showcase-wrapper p-0">
    <ul class="list-items no-list mt-5">
        @foreach ($products as $product)
        <li class="showcase-item bg-grey">
            @if ($loop->index % 2 === 0)
            <div class="showcase-block showcase-image-top media row m-0 align-items-center">
                <div class="showcase-image col-lg-6 p-0">
                    <div class="showcase-image-wrapper">
                        <div class="tag-before"><span>Before</span></div>
                        <div class="tag-after"><span>After</span></div>
                        <img src="{{ publicSrc($product->image_ba_src) }}" alt="{{ $product->image_ba_src }}">
                    </div>
                </div>
                <div class="showcase-text media-body col-lg-6 p-0">
                    <div class="showcase-text-wrapper">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            @else
            <div class="showcase-block showcase-image-bottom media row m-0 align-items-center">
                <div class="showcase-text media-body col-lg-6 p-0">
                    <div class="showcase-text-wrapper">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="showcase-image col-lg-6 p-0">
                    <div class="showcase-image-wrapper">
                        <div class="tag-before"><span>Before</span></div>
                        <div class="tag-after"><span>After</span></div>
                        <img src="{{ publicSrc($product->image_ba_src) }}" alt="{{ $product->image_ba_src }}">
                    </div>
                </div>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</section>
