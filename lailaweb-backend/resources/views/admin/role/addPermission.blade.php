@extends('layouts.admin')
@section('title')
    <title>Tạo danh mục</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Menus', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Chọn phân quyền trang</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn phân quyền</option>
                                    @foreach (config('permissions.table_module') as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @foreach (config('permissions.module_chil') as $key => $value)
                                    <div class="form-check-inline {{ $loop->last ? '' : ' col-md-3' }}">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="module_chil[]"
                                                value="{{ $value }}">{{ $value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
