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
                        @if ($productRecommends->stock === 1)
                            <span class="new-price">{{ number_format($productRecommends->price_sale) }} VND</span>
                            <span class="old-price">{{ number_format($productRecommends->price) }} VND</span> <br>
                        @else
                            <p class="mb-0"><strong>{{ number_format((string) $productRecommends->price) }}
                                    VND</strong></p>
                        @endif




                        <a><span class="badge badge-success">bán chạy</span></a>
                        <a class="btn btn-success rounded add_to_cart"
                            data-url="{{ route('product.addToCart', ['id' => $productRecommends->id]) }}">Thêm vào<i
                                class="fas fa-shopping-cart fa-xl ml-2"></i></a>
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
