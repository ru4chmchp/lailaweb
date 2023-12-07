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
        @include('layouts.admin-layouts.content-header', ['name' => 'Users', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger action_delete" data-url="{{ route('users.delete', ['id' => $value->id]) }}">Xóa</a>
                                            <a href="{{ route('users.edit', ['id' => $value->id]) }}" class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
