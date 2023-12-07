@extends('layouts.main')

@section('title')
    <title>Fish - Home</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function addToCart(event) {
                event.preventDefault();
                let urlCart  = $(this).data('url');
                $.ajax({
                    type: "GET",
                    url: urlCart,
                    dataType: 'json',
                    success: function(data) {
                        if (data.code === 200) {
                            alert('them sp vao do hang thanh cong')
                        }
                    },
                    error: function() {

                    }
                });
            }

            $(document).on('click', '.add_to_cart', addToCart);
        });
    </script>
@endsection


@section('body')

    <body class="category-v2 hidden-sn white-skin animated">
    @endsection

    @section('content')
        <div class="container mt-5 pt-3">
            <!-- Navbar-->
            <div class="row pt-4">

                <!-- Content-->
                <div class="col-lg-9">

                    <!-- Filter Area-->
                    <div class="row">

                        {{-- <div class="col-md-4 mt-3">

                            <!-- Sort by-->
                            <select class="mdb-select grey-text md-form" multiple>

                                <option value="" disabled selected>Choose your option</option>

                                <option value="1">Option 1</option>

                                <option value="2">Option 2</option>

                                <option value="3">Option 3</option>

                            </select>

                            <label class="mdb-main-label">Example label</label>

                            <button class="btn-save btn btn-primary btn-sm">Save</button>

                            <!-- Sort by-->
                        </div> --}}

                        {{-- <div class="col-8 col-md-8 text-right">

                            <!-- View Switcher-->
                            <a class="btn blue darken-3 btn-sm"><i class="fas fa-th mr-2" aria-hidden="true"></i><strong>
                                    Grid</strong></a>

                            <a class="btn blue darken-3 btn-sm"><i class="fas fa-th-list mr-2"
                                    aria-hidden="true"></i><strong>

                                    List</strong></a>
                            <!-- View Switcher-->
                        </div> --}}

                    </div>
                    <!-- Filter Area-->

                    <!-- Products Grid-->
                    <section class="section pt-4">

                        <!-- Grid row-->
                        <div class="row">

                            @foreach ($products as $key => $value)
                                <!-- Grid column-->
                                <div class="col-lg-4 {{ $key == 0 ? 'col-md-12' : 'col-md-6' }} mb-4">

                                    <!-- Card-->
                                    <div class="card card-ecommerce">

                                        <!-- Card image-->
                                        <div class="view overlay">
                                            @php
                                                $baseUrl = config('app.baseUrl');
                                            @endphp
                                            <img src="{{ $baseUrl . $value->feature_image_path }}" class="img-card"
                                                alt="">

                                            <a>

                                                <div class="mask rgba-white-slight"></div>

                                            </a>

                                        </div>
                                        <!-- Card image-->

                                        <!-- Card content-->
                                        <div class="card-body">

                                            <!-- Category & Title-->
                                            <h5 class="card-title mb-1"><strong><a href=""
                                                        class="dark-grey-text">{{ $value->name }}</a></strong></h5><span
                                                class="badge badge-danger mb-2">bestseller</span>

                                            <!-- Rating-->
                                            <ul class="rating">

                                                <li><i class="fas fa-star blue-text"></i></li>

                                                <li><i class="fas fa-star blue-text"></i></li>

                                                <li><i class="fas fa-star blue-text"></i></li>

                                                <li><i class="fas fa-star blue-text"></i></li>

                                                <li><i class="fas fa-star blue-text"></i></li>

                                            </ul>

                                            <!-- Card footer-->
                                            <div class="card-footer pb-0">

                                                <div class="row mb-0">

                                                    <span
                                                        class="float-left"><strong>{{ number_format($value->price) }}VNĐ</strong></span>

                                                    <span class="float-right">

                                                        <a class="fas fa-shopping-cart ml-3 add_to_cart"
                                                            data-url="{{ route('product.addToCart', ['id' => $value->id]) }}">
                                                        </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Card content-->

                                    </div>
                                    <!-- Card-->

                                </div>
                                <!-- Grid column-->
                            @endforeach
                        </div>
                        <!-- Grid row-->
                        {{ $products->links('pagination::bootstrap-5') }}


                    </section>
                    <!-- Products Grid-->

                </div>
                <!-- Content-->

                <!-- Sidebar-->
                <div class="col-lg-3">

                    <div class="">

                        <!-- Grid row-->
                        <div class="row">

                            <div class="col-md-6 col-lg-12 mb-5">

                                <!-- Panel-->
                                <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h3>

                                    <div class="divider"></div>

                                    <p class="blue-text"><a>Default</a></p>

                                    <p class="dark-grey-text"><a>Popularity</a></p>

                                    <p class="dark-grey-text"><a>Average rating</a></p>

                                    <p class="dark-grey-text"><a>Price: low to high</a></p>

                                    <p class="dark-grey-text"><a>Price: high to low</a></p>

                            </div>

                            <!-- Filter by category-->
                            <div class="col-md-6 col-lg-12 mb-5">

                                <h5 class="font-weight-bold dark-grey-text"><strong>Category</strong></h3>

                                    <div class="divider"></div>

                                    <!-- Radio group-->
                                    <div class="form-group ">

                                        <input class="form-check-input" name="group100" type="radio" id="radio100">

                                        <label for="radio100" class="form-check-label dark-grey-text">All</label>

                                    </div>

                                    <div class="form-group">

                                        <input class="form-check-input" name="group100" type="radio" id="radio101"
                                            checked>

                                        <label for="radio101" class="form-check-label dark-grey-text">Laptop</label>

                                    </div>

                                    <div class="form-group">

                                        <input class="form-check-input" name="group100" type="radio" id="radio102">

                                        <label for="radio102" class="form-check-label dark-grey-text">Smartphone</label>

                                    </div>

                                    <div class="form-group">

                                        <input class="form-check-input" name="group100" type="radio" id="radio103">

                                        <label for="radio103" class="form-check-label dark-grey-text">Tablet</label>

                                    </div>

                                    <div class="form-group">

                                        <input class="form-check-input" name="group100" type="radio" id="radio104">

                                        <label for="radio104" class="form-check-label dark-grey-text">Headphones</label>

                                    </div>
                                    <!-- Radio group-->

                            </div>
                            <!-- Filter by category-->

                        </div>
                        <!-- Grid row-->

                        <!-- Grid row-->
                        <div class="row">

                            <!-- Filter by price-->
                            {{-- <div class="col-md-6 col-lg-12 mb-5">

                                <h5 class="font-weight-bold dark-grey-text"><strong>Price</strong></h3>

                                    <div class="divider"></div>

                                    <form class="range-field mt-3">

                                        <input id="calculatorSlider" class="no-border" type="range" value="0"
                                            min="0" max="30" />

                                    </form>

                                    <!-- Grid row-->
                                    <div class="row justify-content-center">

                                        <!-- Grid column-->
                                        <div class="col-md-6 text-left">

                                            <p class="dark-grey-text"><strong id="resellerEarnings">0$</strong></p>

                                        </div>
                                        <!-- Grid column-->

                                        <!-- Grid column-->
                                        <div class="col-md-6 text-right">

                                            <p class="dark-grey-text"><strong id="clientPrice">319$</strong></p>

                                        </div>
                                        <!-- Grid column-->

                                    </div>
                                    <!-- Grid row-->

                            </div> --}}
                            <!-- Filter by price-->

                            <!-- Filter by rating-->
                            {{-- <div class="col-md-6 col-lg-12 mb-5">

                                <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h3>

                                    <div class="divider"></div>

                                    <div class="row ml-1">

                                        <!-- Rating-->
                                        <ul class="rating mb-0">

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li>

                                                <p class="ml-3 dark-grey-text"><a>4 and more</a></p>

                                            </li>

                                        </ul>

                                    </div>

                                    <div class="row ml-1">

                                        <!-- Rating-->
                                        <ul class="rating mb-0">

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star grey-text"></i></li>

                                            <li>

                                                <p class="ml-3 dark-grey-text"><a>3 - 3,99</a></p>

                                            </li>

                                        </ul>

                                    </div>

                                    <div class="row ml-1">

                                        <!-- Rating-->
                                        <ul class="rating">

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star blue-text"></i></li>

                                            <li><i class="fas fa-star grey-text"></i></li>

                                            <li><i class="fas fa-star grey-text"></i></li>

                                            <li>

                                                <p class="ml-3 dark-grey-text"><a>3.00 and less</a></p>

                                            </li>

                                        </ul>

                                    </div>

                            </div> --}}
                            <!-- Filter by rating-->

                        </div>
                        <!-- Grid row-->

                    </div>

                </div>
                <!-- Sidebar-->

            </div>

        </div>
    @endsection
