<section class="section my-5 pb-5 cart_wrapper">

    <div class="card card-ecommerce" data-url="{{ route('product.deleteCart') }}">

        <div class="card-body">

            <!-- Shopping Cart table -->
            <div class="table-responsive">

                <table class="table product-table table-cart-v-2 update_cart_url"
                    data-url="{{ route('product.updateCart') }}">

                    <!-- Table head -->
                    <thead class="mdb-color lighten-5">

                        <tr>
                            <th class="font-weight-bold">

                                <strong>#</strong>

                            </th>

                            <th></th>

                            <th class="font-weight-bold">

                                <strong>Product</strong>

                            </th>

                            <th></th>

                            <th class="font-weight-bold">

                                <strong>Price</strong>

                            </th>

                            <th class="font-weight-bold">

                                <strong>QTY</strong>

                            </th>

                            <th class="font-weight-bold">

                                <strong>Amount</strong>

                            </th>

                            <th></th>

                        </tr>

                    </thead>
                    <!-- Table head -->
                    <tbody>
                        @php
                            $baseUrl = config('app.baseUrl');
                            $total = 0;
                        @endphp
                        @foreach ($carts as $value => $item)
                            <!-- First row -->
                            <tr>
                                @php
                                    $quantity = intval($item['quantity']); // Chuyển đổi thành số nguyên
                                    $price = intval($item['price']); // Chuyển đổi thành số nguyên
                                    $subtotal = $quantity * $price; // Tính tổng số tiền
                                    $total += $subtotal; // Cộng vào tổng số tiền
                                @endphp
                                <th scope="row">

                                    <img src="{{ $baseUrl . $item['feature_image_path'] }}" alt=""
                                        class="img-card z-depth-0">

                                </th>

                                <td>

                                    <h5 class="mt-3">

                                        <strong>{{ $item['name'] }}</strong>

                                    </h5>

                                    <p class="text-muted">Apple</p>

                                </td>

                                <td></td>

                                <td>{{ number_format($price)}}</td>

                                <td class="text-center text-md-left">

                                    <span class="qty">{{ $quantity }}</span>

                                    <div class="btn-group radio-group ml-2" data-toggle="buttons">

                                        <label class="btn btn-sm btn-primary btn-rounded decrease "
                                            data-id="{{ $value }}">

                                            <input type="radio" name="options" id="option1">&mdash;

                                        </label>

                                        <label class="btn btn-sm btn-primary btn-rounded increase "
                                            data-id="{{ $value }}">

                                            <input type="radio" name="options" id="option2">+

                                        </label>

                                    </div>

                                </td>

                                <td class="font-weight-bold">

                                    <strong>{{ number_format($subtotal) }}</strong>

                                </td>

                                <td>

                                    <a href="" class="btn btn-sm btn-primary cart_delete" data-id="{{ $value }}">X

                                    </a>

                                </td>

                            </tr>
                            <!-- First row -->
                        @endforeach
                        <!-- Fourth row -->
                        <tr>

                            <td colspan="3"></td>

                            <td>

                                <h4 class="mt-2">

                                    <strong>Total</strong>

                                </h4>

                            </td>

                            <td class="text-right">

                                <h4 class="mt-2">

                                    <strong>{{ number_format($total) }}</strong>

                                </h4>

                            </td>

                            <td colspan="3" class="text-right">
                                @if (Auth::check())
                                <a href="{{ route('payment', ['id' => Auth::user()->id]) }}" class="btn btn-primary btn-rounded">Thanh toán<i class="fas fa-angle-right right"></i></a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-rounded">Đăng nhập để thanh toán</a>
                            @endif
                            </td>

                        </tr>
                        <!-- Fourth row -->

                    </tbody>
                    <!-- Table body -->

                </table>

            </div>
            <!-- Shopping Cart table -->

        </div>

    </div>


</section>
