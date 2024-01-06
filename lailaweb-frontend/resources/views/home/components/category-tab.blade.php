<section class="mb-2">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
        @foreach ($categories as $key => $value)
            <li class="nav-item" role="presentation">
                <a data-mdb-tab-init class="nav-link {{ $key == 0 ? 'active' : '' }}"
                    id="category_tab_{{ $value->id }}" href="#category_content_{{ $value->id }}" role="tab"
                    aria-controls="category_content_{{ $value->id }}"
                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    <i class="{{ iconFontAwsomeware($key) }}"></i>{{ $value->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <!-- Tabs navs -->


    <!-- Tabs content -->
    <div class="tab-content" id="myTabContent">
        @foreach ($categories as $index => $item)
            <div class="tab-pane fade @if ($index === 0) show active @endif"
                id="category_content_{{ $item->id }}" role="tabpanel"
                aria-labelledby="category_tab_{{ $item->id }}">
                <!-- Nội dung tương ứng với mỗi tab -->
                <div class="row">
                    @foreach (getProductOfCategory($item->id) as $productChild)
                        @php
                            $discountPercentage = $productChild->price != 0 ? (1 - $productChild->price_sale / $productChild->price) * 100 : 0;
                        @endphp
                        <div class="col-md-3 p-2">

                            <div class="card text-center border rounded-lg shadow-0">
                                <div class="label_product">
                                    <div class="label_wrapper">-{{ number_format($discountPercentage,1) . "%" }}</div>
                                </div>
                                <!-- Nội dung sản phẩm -->
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="{{ config('app.baseUrl') . $productChild->feature_image_path }}"
                                        class="img-card" />
                                    <a
                                        href="{{ route('detailProduct', ['slug' => $productChild->slug, 'id' => $productChild->id]) }}">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)">
                                        </div>
                                    </a>
                                </div>
                                <div class="cart-headerr">
                                    <strong><a
                                            href="{{ route('detailProduct', ['slug' => $productChild->slug, 'id' => $productChild->id]) }}"
                                            class="dark-grey-text">{{ $productChild->name }}</a></strong>
                                </div>
                                <div class="card-body pt-0">
                                    <a><span class="badge badge-info">sale</span></a>                        
                                    <br>
                                    <span class="new-price">{{ number_format($productChild->price_sale) }} VND</span>
                                    <span class="old-price">{{ number_format($productChild->price) }} VND</span>
                                    <a class="btn btn-info rounded add_to_cart"
                                        data-url="{{ route('product.addToCart', ['id' => $productChild->id]) }}">Thêm
                                        vào<i class="fas fa-shopping-cart fa-xl ml-2"></i></a>

                                </div>
                                <!-- Kết thúc nội dung sản phẩm -->
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- Kết thúc nội dung tương ứng với mỗi tab -->
            </div>
        @endforeach
    </div>
    <!-- Tabs content -->
</section>
