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
        @include('layouts.admin-layouts.content-header', ['name' => 'Products', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data" class="form-row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên sản phẩm" name="name" value="{{ $product->name }}">
                                @error('name')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá Sản Phẩm</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Nhập giá sản phẩm" name="price" value="{{ $product->price }}">
                                @error('price')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh</label>
                                <input type="file" class="form-control-file " placeholder="Nhập giá sản phẩm"
                                    name="feature_image_path">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img src="{{ $product->feature_image_path }}" alt=""
                                            class="image_product_width">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ảnh Chi tiết</label>
                                <input type="file" class="form-control-file" placeholder="Nhập giá sản phẩm"
                                    name="image_path[]" multiple>
                                <div class="col-md-12">

                                    <div class="row">
                                        @foreach ($product->images as $value)
                                            <div class="col-md-4">
                                                <img src="{{ $value->image_path }}" alt=""
                                                    class="image_product_width">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Chọn Danh mục</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nhập tag</label>
                                <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
                                    @foreach ($product->tags as $value)
                                        <option value="{{ $value->name }}" selected>{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Content</label>
                                <textarea class="form-control tinymce_editor_init  @error('content') is-invalid @enderror" rows="4"
                                    name="content">{{ $product->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="checkbox" class="form-control" id="discountCheckbox"
                                    placeholder="Nhập giá sản phẩm" name="stock" value="1"
                                    {{ $product->stock === 1 ? 'checked' : '' }}>

                            </div>
                            <div class="form-group" id="priceSaleInput"
                                style="display:{{ $product->stock === 1 ? '' : 'none;' }}">
                                <label>---------->Giá sale</label>
                                <input type="text" class="form-control @error('price_sale') is-invalid @enderror"
                                    placeholder="Nhập giá sản phẩm" name="price_sale" value="{{ $product->price_sale }}">
                                @error('price')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                            </div>
                            <div class="form-group ">
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
