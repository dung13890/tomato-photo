<h2 class="text-center">OTHER SERVICES</h2>
<a class="btn btn-default" target="_blank" href="{{ route('backend.product.create') }}"><i class="ion-edit"></i> {{ __('repositories.title.edit')  }}</a>
<div class="row">
    <hr>
    @foreach($products as $product)
        <div class="col-sm-6">
            <div class="row mb-10">
                <div class="col-sm-6">
                    <img class="img-responsive" src="{{ publicSrc($product->image_src) }}" alt="{{ $product->image_title }}" />
                </div>
                <div class="col-sm-6">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->intro }}</p>
                    <p class="price">{{ $product->price }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
