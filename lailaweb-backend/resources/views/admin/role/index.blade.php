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
        @include('layouts.admin-layouts.content-header', ['name' => 'Roles', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                        <a href="{{ route('permissions.index') }}" class="btn btn-primary float-right m-2">Add Permission</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên vai trò</th>
                                    <th scope="col">Mô tả vai trò</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->display_name }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger action_delete"
                                                data-url="{{ route('roles.delete', ['id' => $value->id]) }}">Xóa</a>

                                            <a href="{{ route('roles.edit', ['id' => $value->id]) }}"
                                                class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
