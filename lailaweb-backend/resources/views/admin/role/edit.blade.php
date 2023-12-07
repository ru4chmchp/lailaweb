@extends('layouts.admin')
@section('title')
    <title>Tạo danh mục</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminConfig/slider/add/add.css') }}">
@endsection
@section('js')
    <script>
        $(function() {
            $('.checkbox_parent').on('click', function() {
                $(this).parents('.card').find('.checkbox_chil').prop('checked', $(this).prop('checked'));
            });
            $('.check_all').on('click', function() {
                $(this).parents().find('.checkbox_chil').prop('checked', $(this).prop('checked'));
            });
            $('.check_all').on('click', function() {
                $(this).parents().find('.checkbox_parent').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Roles', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST" class="form-row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control " placeholder="Nhập vai trò" name="name"
                                    value="{{ $role->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mô tả vai trò</label>
                                <input class="form-control " name="display_name" value="{{ $role->display_name }}">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="check_all">
                                        CheckAll
                                    </label>
                                </div>
                                @foreach ($permissionParent as $value)
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-blue">
                                            <h5 class="card-title">
                                                <label><label><input type="checkbox" value="{{ $value->id }} "
                                                            class="checkbox_parent"></label>
                                                </label>
                                                Module {{ $value->name }}
                                            </h5>
                                        </div>
                                        <div class="row">
                                            @foreach ($value->permissionsChil as $permissionChil)
                                                <div class="card-body text-primary  col-md-3">
                                                    <h5 class="card-title">
                                                        <label><label><input type="checkbox" name="permission_id[]"
                                                                    value="{{ $permissionChil->id }}" class="checkbox_chil"
                                                                    {{ $permission->contains('id', $permissionChil->id) ? 'checked' : '' }}></label>
                                                        </label>
                                                        {{ $permissionChil->name }}
                                                    </h5>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
