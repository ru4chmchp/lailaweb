@extends('layouts.admin')
@section('title')
    <title>Tạo danh mục</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('adminConfig/slider/add/add.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('adminConfig/user/add/add.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Customers', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('customers.update',['id' => $customers->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên User</label>
                                <input type="text" class="form-control" placeholder="Nhập tên User" name="name"
                                    value="{{ $customers->name }}">
                            </div>
                            <div class="form-group">
                                <label>Tên Email</label>
                                <input type="email" class="form-control" placeholder="Nhập tên Email" name="email"
                                    value="{{ $customers->email }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Nhập Password" name="password"
                                    value="{{ $customers->password }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
