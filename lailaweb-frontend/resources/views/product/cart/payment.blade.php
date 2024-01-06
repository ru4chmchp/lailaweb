@extends('layouts.main')

@section('title')
    <title>Fish - Home</title>
@endsection

@section('css')
@endsection

@section('js')
@endsection


@section('body')

    <body class="cart-v2 hidden-sn white-skin animated">
    @endsection

    @section('content')
        <!-- Main Layout -->
        <main>

            <!-- Main Container -->
            <div class="container">
                <main class="page payment-page">
                    <section class="payment-form dark">
                        <div class="container">
                            <div class="block-heading">
                                <h2>Thanh toán</h2>
                                <p>Hóa đơn của bạn sau khi đã điền đủ thông tin sẽ được gửi đến cửa hàng và sẽ được trả lời
                                    trong thời gian sớm nhất</p>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong>{{ $message }}</strong>

                                </div>
                            @endif
                            <form action="{{ route('process.checkout') }}" method="POST">
                                @csrf
                                <div class="products">
                                    <h3 class="title">Số sản phẩm</h3>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carts as $item)
                                        @php
                                            $quantity = intval($item['quantity']); // Chuyển đổi thành số nguyên
                                            $price = intval($item['price']); // Chuyển đổi thành số nguyên
                                            $subtotal = $quantity * $price; // Tính tổng số tiền
                                            $total += $subtotal; // Cộng vào tổng số tiền
                                        @endphp
                                        <div class="item">
                                            <span class="price">{{ number_format($price) }} VND</span>
                                            <span class="float-right mr-5">SL :{{ $item['quantity'] }}</span>
                                            <p class="item-name">{{ $item['name'] }} </p>
                                        </div>
                                    @endforeach
                                    <div class="total">Total<span class="price">{{ number_format($total) }} VND</span>
                                    </div>
                                </div>
                                <div class="card-details">
                                    <h3 class="title">Thông tin đơn hàng</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-7">
                                            <label for="card-holder">Họ và tên</label>
                                            <input id="card-holder" type="text" class="form-control"
                                                placeholder="Họ và tên" aria-label="Card Holder"
                                                aria-describedby="basic-addon1" value="{{ $customers->name }}">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="card-holder">Số điện thoại</label>
                                            <input id="card-holder" type="text" class="form-control"
                                                placeholder="Số điện thoại" aria-label="Card Holder"
                                                aria-describedby="basic-addon1" value="{{ $customers->phone }}">

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="card-number">Địa chỉ</label>
                                            <input id="card-number" type="text" class="form-control"
                                                placeholder="Địa chỉ" aria-label="Card Holder"
                                                aria-describedby="basic-addon1" value="{{ $customers->address }}">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="cvc">Ghi chú</label>
                                            <textarea name="reminder" class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-block">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </main>
            </div>
            <!-- Main Container -->

        </main>
        <!-- Main Layout -->
    @endsection
