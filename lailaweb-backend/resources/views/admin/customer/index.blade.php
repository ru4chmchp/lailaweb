@extends('layouts.admin')
@section('title')
    <title>Categories</title>
@endsection
@section('js')
    <script src="{{ asset('adminConfig/slider/index/index.js') }}"></script>
    <script src="{{ asset('vendors/sweetAlert/sweetalert2@11.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Customers', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tài khoảng</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <a data-url="{{ route('customers.delete', ['id' => $value->id]) }}"
                                                class="btn btn-danger action_delete">Xóa</a>
                                            <a href="{{ route('customers.edit', ['id' => $value->id]) }}"
                                                class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
