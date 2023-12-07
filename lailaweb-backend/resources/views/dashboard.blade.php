@extends('layouts.admin')
@section('title')
    <title>Day la chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('layouts.admin-layouts.content-header', ['name' => 'Dashboard', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h1>Trang chủ</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
