@extends('layouts.admin')
@section('title')
    <title>Tạo danh mục</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminConfig/slider/add/add.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Newsletters', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('newsletters.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Newsletter</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên Newsletter" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" rows="4"
                                    name="content">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control-file @error('image_path') is-invalid @enderror"
                                    name="image_path">
                                @error('image_path')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
