<div class="owl-carousel owl-theme">
    @foreach ($productsRecommend as $value => $productRecommends)
        <div class="item mb-3 ">
            <div class="col-16 height-card">
                <div class="card h-100 ">
                    @php
                        $baseUrl = config('app.baseUrl');
                    @endphp
                    <img src="{{ $baseUrl . $productRecommends->feature_image_path }}"
                        class="card-img-top height-product-recommend" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 font-size-titel"><strong><a
                                    href="{{ route('detailProduct', ['slug' => $productRecommends->slug, 'id' => $productRecommends->id]) }}"
                                    class="dark-grey-text">{{ $productRecommends->name }}</a></strong>
                        </h5>
                        <span>Giá bán</span>
                        <p class="mb-0"><strong>{{ number_format((string) $productRecommends->price) }}
                                VND</strong></p>
                        <a><span class="badge badge-danger">bestseller</span></a>
                        <a class="btn btn-primary rounded add_to_cart" data-url="{{ route('product.addToCart', ['id' => $productRecommends->id]) }}">Add to card</a>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted text-center">Cập nhật :
                            {{ $productRecommends->updated_at->format('Y-m-d') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
