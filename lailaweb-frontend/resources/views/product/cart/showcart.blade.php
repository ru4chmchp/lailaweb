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
            $('.cart_wrapper').on('click', '.decrease', function() {
                let quantityElement = $(this).closest('tr').find('.qty');
                let quantity = parseInt(quantityElement.text());
                let id = $(this).data('id');

                if (quantity > 0) {
                    quantity--;
                    quantityElement.text(quantity);
                    updateCart(id, quantity);
                }
            });

            $('.cart_wrapper').on('click', '.increase', function() {
                let quantityElement = $(this).closest('tr').find('.qty');
                let quantity = parseInt(quantityElement.text());
                let id = $(this).data('id');

                quantity++; // Tăng giá trị lên 1
                quantityElement.text(quantity);
                updateCart(id, quantity);
            });

            $('.cart_wrapper').on('click', '.cart_delete', function() {
                let id = $(this).data('id');
                deleteCart(id);
            });

            function deleteCart(id) {
                const urlDelete = $('.card-ecommerce').data('url');
                $.ajax({
                    type: "GET",
                    url: urlDelete,
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('.cart_wrapper').html(data.cart_component);
                        }
                    },
                    error: function() {

                    }
                });
            }

            function updateCart(id, quantity) {
                const urlUpdate = $('.update_cart_url').data('url');
                $.ajax({
                    type: "GET",
                    url: urlUpdate,
                    data: {
                        id: id,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('.cart_wrapper').html(data.cart_component);
                        }
                    },
                    error: function() {

                    }
                });
            }
        });
    </script>
@endsection


@section('body')

    <body class="cart-v2 hidden-sn white-skin animated">
    @endsection

    @section('content')
        <!-- Main Layout -->
        <main>

            <!-- Main Container -->
            <div class="container">

                <!-- Section cart -->
                @include('product.cart.components.cartupdate')
                <!-- Section cart -->

                <!-- Section products -->
                <section>

                    <h4 class="font-weight-bold mt-4 title-1">

                        <strong>YOU MAY BE INTERESTED IN</strong>

                    </h4>

                    <hr class="blue mb-5">

                    <!-- Grid row -->
                    <div class="row mb-3">

                        <!-- Grid column -->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!-- Card -->
                            <div class="card card-ecommerce">

                                <!-- Card image -->
                                <div class="view overlay">

                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg"
                                        class="img-fluid" alt="">

                                    <a>

                                        <div class="mask rgba-white-slight"></div>

                                    </a>

                                </div>
                                <!-- Card image -->

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Category & Title -->
                                    <h5 class="card-title mb-1">

                                        <strong>

                                            <a href="" class="dark-grey-text">Sony D74v</a>

                                        </strong>

                                    </h5>

                                    <span class="badge badge-info mb-2">new</span>

                                    <!-- Rating -->
                                    <ul class="rating">

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                    </ul>

                                    <!-- Card footer -->
                                    <div class="card-footer pb-0">

                                        <div class="row mb-0">

                                            <span class="float-left">

                                                <strong>1439$</strong>

                                            </span>

                                            <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Cart">

                                                    <i class="fas fa-shopping-cart ml-3"></i>

                                                </a>

                                            </span>

                                        </div>

                                    </div>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!-- Card -->
                            <div class="card card-ecommerce">

                                <!-- Card image -->
                                <div class="view overlay">

                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/8.jpg"
                                        class="img-fluid" alt="">

                                    <a>

                                        <div class="mask rgba-white-slight"></div>

                                    </a>

                                </div>
                                <!-- Card image -->

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Category & Title -->
                                    <h5 class="card-title mb-1">

                                        <strong>

                                            <a href="" class="dark-grey-text">Samsung V54</a>

                                        </strong>

                                    </h5>

                                    <span class="badge badge-info mb-2">new</span>

                                    <!-- Rating -->
                                    <ul class="rating">

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                    </ul>

                                    <!-- Card footer -->
                                    <div class="card-footer pb-0">

                                        <div class="row mb-0">

                                            <span class="float-left">

                                                <strong>1439$</strong>

                                            </span>

                                            <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Cart">

                                                    <i class="fas fa-shopping-cart ml-3"></i>

                                                </a>

                                            </span>

                                        </div>

                                    </div>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!-- Card -->
                            <div class="card card-ecommerce">

                                <!-- Card image -->
                                <div class="view overlay">

                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/7.jpg"
                                        class="img-fluid" alt="">

                                    <a>

                                        <div class="mask rgba-white-slight"></div>

                                    </a>

                                </div>
                                <!-- Card image -->

                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Category & Title -->
                                    <h5 class="card-title mb-1">

                                        <strong>

                                            <a href="" class="dark-grey-text">Dell 786i</a>

                                        </strong>

                                    </h5>

                                    <span class="badge badge-info mb-2">new</span>

                                    <!-- Rating -->
                                    <ul class="rating">

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star grey-text"></i>

                                        </li>

                                    </ul>

                                    <!-- Card footer -->
                                    <div class="card-footer pb-0">

                                        <div class="row mb-0">

                                            <span class="float-left">

                                                <strong>1439$</strong>

                                            </span>

                                            <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Cart">

                                                    <i class="fas fa-shopping-cart ml-3"></i>

                                                </a>

                                            </span>

                                        </div>

                                    </div>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-3 col-md-6 mb-4">

                            <!-- Card -->
                            <div class="card card-ecommerce">

                                <!-- Card image -->
                                <div class="view overlay">

                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/9.jpg"
                                        class="img-fluid" alt="">

                                    <a>

                                        <div class="mask rgba-white-slight"></div>

                                    </a>

                                </div>

                                <!-- Card image -->
                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Category & Title -->
                                    <h5 class="card-title mb-1">

                                        <strong>

                                            <a href="" class="dark-grey-text">Canon 675-D</a>

                                        </strong>

                                    </h5>

                                    <span class="badge badge-info mb-2">new</span>

                                    <span class="badge badge-success mb-2 ml-2">SALE</span>

                                    <!-- Rating -->
                                    <ul class="rating">

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                        <li>

                                            <i class="fas fa-star blue-text"></i>

                                        </li>

                                    </ul>

                                    <!-- Card footer -->
                                    <div class="card-footer pb-0">

                                        <div class="row mb-0">

                                            <h5 class="mb-0 pb-0 mt-1 font-weight-bold">

                                                <span class="red-text">

                                                    <strong>$1199</strong>

                                                </span>

                                                <span class="grey-text">

                                                    <small>

                                                        <s>$1520</s>

                                                    </small>

                                                </span>

                                            </h5>

                                            <span class="float-right">

                                                <a class="" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Cart">

                                                    <i class="fas fa-shopping-cart ml-3"></i>

                                                </a>

                                            </span>

                                        </div>

                                    </div>

                                </div>
                                <!-- Card content -->

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                    <!-- Grid row -->
                    <div class="row flex-center mb-5">

                        <p>

                            <a class="btn btn-primary btn-rounded mb-5" data-toggle="collapse" href="#collapseExample1"
                                aria-expanded="false" aria-controls="collapseExample1">More products</a>

                        </p>

                        <div class="collapse" id="collapseExample1">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-3 col-md-6 mb-4">

                                    <!-- Card -->
                                    <div class="card card-ecommerce">

                                        <!-- Card image -->
                                        <div class="view overlay">

                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/3.jpg"
                                                class="img-fluid" alt="">

                                            <a>

                                                <div class="mask rgba-white-slight"></div>

                                            </a>

                                        </div>
                                        <!-- Card image -->

                                        <!-- Card content -->
                                        <div class="card-body">

                                            <!-- Category & Title -->
                                            <h5 class="card-title mb-1">

                                                <strong>

                                                    <a href="" class="dark-grey-text">Asus GR-597</a>

                                                </strong>

                                            </h5>

                                            <span class="badge badge-danger mb-2">bestseller</span>

                                            <!-- Rating -->
                                            <ul class="rating text-left">

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                            </ul>

                                            <!-- Card footer -->
                                            <div class="card-footer pb-0">

                                                <div class="row mb-0">

                                                    <span class="float-left">

                                                        <strong>1439$</strong>

                                                    </span>

                                                    <span class="float-right">

                                                        <a class="" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Cart">

                                                            <i class="fas fa-shopping-cart ml-3"></i>

                                                        </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Card content -->

                                    </div>
                                    <!-- Card -->

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-3 col-md-6 mb-4">

                                    <!-- Card -->
                                    <div class="card card-ecommerce">

                                        <!-- Card image -->
                                        <div class="view overlay">

                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/5.jpg"
                                                class="img-fluid" alt="">

                                            <a>

                                                <div class="mask rgba-white-slight"></div>

                                            </a>

                                        </div>
                                        <!-- Card image -->

                                        <!-- Card content -->
                                        <div class="card-body">

                                            <!-- Category & Title -->
                                            <h5 class="card-title mb-1">

                                                <strong>

                                                    <a href="" class="dark-grey-text">Asus CT-567</a>

                                                </strong>

                                            </h5>

                                            <span class="badge badge-danger mb-2">bestseller</span>

                                            <!-- Rating -->
                                            <ul class="rating text-left">

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                            </ul>

                                            <!-- Card footer -->
                                            <div class="card-footer pb-0">

                                                <div class="row mb-0">

                                                    <span class="float-left">

                                                        <strong>1439$</strong>

                                                    </span>

                                                    <span class="float-right">

                                                        <a class="" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Cart">

                                                            <i class="fas fa-shopping-cart ml-3"></i>

                                                        </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Card content -->

                                    </div>
                                    <!-- Card -->

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-3 col-md-6 mb-4">

                                    <!-- Card -->
                                    <div class="card card-ecommerce">

                                        <!-- Card image -->
                                        <div class="view overlay">

                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/2.jpg"
                                                class="img-fluid" alt="">

                                            <a>

                                                <div class="mask rgba-white-slight"></div>

                                            </a>

                                        </div>
                                        <!-- Card image -->

                                        <!-- Card content -->
                                        <div class="card-body">

                                            <!-- Category & Title -->
                                            <h5 class="card-title mb-1">

                                                <strong>

                                                    <a href="" class="dark-grey-text">iPad PRO</a>

                                                </strong>

                                            </h5>

                                            <span class="badge badge-danger mb-2">bestseller</span>

                                            <span class="badge badge-success mb-2 ml-2">SALE</span>

                                            <!-- Rating -->
                                            <ul class="rating text-left">

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star grey-text"></i>

                                                </li>

                                            </ul>

                                            <!-- Card footer -->
                                            <div class="card-footer pb-0">

                                                <div class="row mb-0">

                                                    <h5 class="mb-0 pb-0 mt-1 font-weight-bold">

                                                        <span class="red-text">

                                                            <strong>$699</strong>

                                                        </span>

                                                        <span class="grey-text">

                                                            <small>

                                                                <s>$920</s>

                                                            </small>

                                                        </span>

                                                    </h5>

                                                    <span class="float-right">

                                                        <a class="" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Cart">

                                                            <i class="fas fa-shopping-cart ml-3"></i>

                                                        </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Card content -->

                                    </div>
                                    <!-- Card -->

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-3 col-md-6 mb-4">

                                    <!-- Card -->
                                    <div class="card card-ecommerce">

                                        <!-- Card image -->
                                        <div class="view overlay">

                                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/4.jpg"
                                                class="img-fluid" alt="">

                                            <a>

                                                <div class="mask rgba-white-slight"></div>

                                            </a>

                                        </div>
                                        <!-- Card image -->

                                        <!-- Card content -->
                                        <div class="card-body">

                                            <!-- Category & Title -->
                                            <h5 class="card-title mb-1">

                                                <strong>

                                                    <a href="" class="dark-grey-text">Dell V-964i</a>

                                                </strong>

                                            </h5>

                                            <span class="badge badge-danger mb-2">bestseller</span>

                                            <!-- Rating -->
                                            <ul class="rating text-left">

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                                <li>

                                                    <i class="fas fa-star blue-text"></i>

                                                </li>

                                            </ul>

                                            <!-- Card footer -->
                                            <div class="card-footer pb-0">

                                                <div class="row mb-0">

                                                    <span class="float-left">

                                                        <strong>1439$</strong>

                                                    </span>

                                                    <span class="float-right">

                                                        <a class="" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Cart">

                                                            <i class="fas fa-shopping-cart ml-3"></i>

                                                        </a>

                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- Card content -->

                                    </div>
                                    <!-- Card -->

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>

                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section products -->

            </div>
            <!-- Main Container -->

        </main>
        <!-- Main Layout -->
    @endsection
