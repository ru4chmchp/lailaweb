@extends('layouts.admin')
@section('title')
    <title>Menus</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminConfig/slider/index/index.css') }}">
@endsection
@section('js')
    <script src="{{ asset('adminConfig/slider/index/index.js') }}"></script>
    <script src="{{ asset('vendors/sweetAlert/sweetalert2@11.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Sliders', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Slider</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $value)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td>
                                            <img src="{{ $value->image_path }}" alt="" class="image_product_width">
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger action_delete"
                                                data-url="{{ route('sliders.delete', ['id' => $value->id]) }}">Xóa</a>
                                            <a href="{{ route('sliders.edit', ['id' => $value->id]) }}"
                                                class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
