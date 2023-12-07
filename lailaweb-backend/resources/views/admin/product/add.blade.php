@extends('layouts.admin')
@section('title')
    <title>Tạo Sản Phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminConfig/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Products', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                            class="form-row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên sản phẩm" name="name" value="{{ old('name'); }}">
                                @error('name')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá Sản Phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập giá sản phẩm" name="price" value="{{ old('price'); }}">
                                @error('price')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh</label>
                                <input type="file" class="form-control-file " placeholder="Nhập giá sản phẩm"
                                    name="feature_image_path">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh Chi tiết</label>
                                <input type="file" class="form-control-file" placeholder="Nhập giá sản phẩm"
                                    name="image_path[]" multiple>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Chọn Danh mục</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">Chọn Danh Mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nhập tag</label>
                                <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
                                    <option value="">Chọn danh mục</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Content</label>
                                <textarea class="form-control tinymce_editor_init @error('content') is-invalid @enderror" rows="4" name="content" >{{ old('content'); }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/jeib0fxy25wsn9fb1g82d5m1j1swygn0h5xvr2sly4t7ejis/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script> --}}
    <script src="{{ asset('adminConfig/product/add/add.js') }}"></script>
@endsection
