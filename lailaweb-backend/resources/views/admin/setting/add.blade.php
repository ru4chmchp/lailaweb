@extends('layouts.admin')
@section('title')
    <title>Tạo danh mục</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminConfig/slider/add/add.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Settings', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('settings.store') . '?type=' . request()->type }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                    placeholder="Nhập Config Key" name="config_key">
                                @error('config_key')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            </div>

                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        placeholder="Nhập Config Value" name="config_value">
                                </div>
                                @error('config_value')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            @elseif (request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <textarea name="config_value" rows="4" placeholder="Nhập Config Value"
                                        class="form-control @error('config_value') is-invalid @enderror"></textarea>
                                </div>
                                @error('config_value')
                                    <div class="alert alert-danger m-2">{{ $message }}</div>
                                @enderror
                            @endif

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
