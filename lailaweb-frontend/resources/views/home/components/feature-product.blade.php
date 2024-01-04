<div class="col-12">

    <!-- Grid row -->
    <div class="row">
        @foreach ($productsFeature as $value)
            <!-- Grid column -->
            <div class="col-lg-6 col-md-6 mb-4">

                <!-- Card -->
                <div class="card card-ecommerce">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-6 d-flex align-items-center">

                            <!-- Card image -->
                            <div class="view overlay">
                                @php
                                    $baseUrl = config('app.baseUrl');
                                @endphp
                                <img src="{{ $baseUrl . $value->feature_image_path }}" class="img-fluid height-product"
                                    alt="">

                                <a>

                                    <div class="mask rgba-white-slight"></div>

                                </a>

                            </div>
                            <!-- Card image -->

                        </div>

                        <!-- Grid column -->
                        <div class="col-6 pl-0">

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Category & Title -->
                                <h5 class="card-title mb-1"><strong><a href="{{ route('detailProduct',['slug' => $value->slug, 'id' => $value->id]) }}"
                                            class="dark-grey-text">{{ $value->name }}</a></strong>
                                </h5>

                                <span class="badge badge-info mb-2">NEW</span>

                                <!-- Rating -->
                                <ul class="rating">

                                    <li><i class="fas fa-star blue-text"></i></li>

                                    <li><i class="fas fa-star blue-text"></i></li>

                                    <li><i class="fas fa-star blue-text"></i></li>

                                    <li><i class="fas fa-star blue-text"></i></li>

                                    <li><i class="fas fa-star grey-text"></i></li>

                                </ul>

                                <!-- Card footer -->
                                <div class="card-footer pb-0">

                                    <div class="row mb-0">

                                        <span
                                            class="float-left"><strong>{{ number_format((string) $value->price) }}</strong></span>

                                        <span class="float-right">

                                            <a class="add_to_cart" data-toggle="tooltip" data-placement="top" data-url="{{ route('product.addToCart', ['id' => $value->id]) }}"
                                                title="Add to Cart"><i class="fas fa-shopping-cart fa-xl ml-3 "></i></a>

                                        </span>

                                    </div>

                                </div>

                            </div>
                            <!-- Card content -->

                        </div>

                    </div>

                </div>
                <!-- Card -->

            </div>
            <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->



</div>
