@extends('layouts.main')

@section('title')
    <title>Fish - Home</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit"></script>
@endsection

@section('body')

    <body class="homepage-v3 hidden-sn white-skin animated">
    @endsection

    @section('content')
        <!-- Main Container -->
        <div class="container">

            <div class="row pt-4">

                <!-- Content -->
                <div class="col-lg-12">

                    <!-- Products Grid -->
                    <section class="section pt-4">

                        <!-- Grid row -->
                        <div class="row ">
                            <!-- Slider column -->
                            @include('home.components.slider')
                            <!-- Slider column -->

                            <!-- Category column -->
                            @include('home.components.category')
                            <!-- Category column -->

                        </div>
                        <!-- Grid row -->

                        <!-- Section small products new -->
                        <section>
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                @include('home.components.feature-product')
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->


                        </section>
                        <!-- Section small products -->

                        <!-- Section advertising 1 -->
                        <section>

                            <!-- Grid row -->
                            <div class="row mt-4 pt-1">

                               @include('home.components.advertising')

                            </div>
                            <!-- Grid row -->

                        </section>
                        <!-- Section advertising 1 -->

                        <!-- Section product list -->
                       @include('home.components.category-tab')
                        <!-- Section product list -->

                        <!-- Grid row -->
                        @include('home.components.introduce')

                        <!-- Grid row -->
                        <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>Sản phẩm phổ biến</strong></h4>

                        <hr class="mb-5">

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            @include('home.components.products-recommend')
                            <!-- Grid column -->
                            
                            
                        </div>
                        <!-- Grid row -->

                    </section>
                    <!-- Products Grid -->

                </div>
                <!-- Content -->

            </div>

        </div>

        <!-- Main Container -->
    @endsection
