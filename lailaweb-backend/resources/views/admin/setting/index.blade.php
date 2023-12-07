@extends('layouts.admin')
@section('title')
    <title>Menus</title>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('adminConfig/product/index/index.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Settings', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Example single danger button -->
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-success dropdown-toggle m-2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Add
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Text</a>
                                <a class="dropdown-item"
                                    href="{{ route('settings.create') . '?type=Textarea' }}">TextArea</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->config_key }}</td>
                                        <td>{{ $value->config_value }}</td>
                                        <td>
                                            <a href="" class="btn btn-danger action_delete"
                                                data-url="{{ route('settings.delete', ['id' => $value->id]) }}">Xóa</a>
                                            <a href="{{ route('settings.edit', ['id' => $value->id]) . '?type=' . $value->type }}"
                                                class="btn btn-warning">Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $settings->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
