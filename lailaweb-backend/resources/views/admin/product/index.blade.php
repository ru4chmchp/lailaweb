@extends('layouts.admin')
@section('title')
    <title>Products</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminConfig/product/index/index.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('adminConfig/product/index/index.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Products', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ number_format((string)$value->price) }}</td>
                                        <td>
                                            <img src="{{ $value->feature_image_path }}" alt="" class="image_product_width">
                                        </td>
                                        <td>{{ optional($value->category)->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger action_delete" data-url="{{ route('products.delete',['id' =>$value->id]) }}">Xóa</a>
                                            <a href="{{ route('products.edit', ['id' =>$value->id]) }}" class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection