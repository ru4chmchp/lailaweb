@extends('layouts.main')

@section('title')
    <title>Fish - Home</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit"></script>
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <section>
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-danger alert-block">

                                                <button type="button" class="close" data-dismiss="alert">×</button>

                                                <strong>{{ $message }}</strong>

                                            </div>
                                        @endif
                                        
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Thông tin cá nhân</p>

                                        <form action="{{ route('updateProfile', ['id' => $customers->id]) }}" class="mx-1 mx-md-4" method="POST">
                                            @csrf
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0 ">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" placeholder="Your Name"
                                                        value="{{ $customers->name }}" />
                                                </div>
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger m-2">{{ $message }}</div>
                                            @enderror

                                            <div class="d-flex flex-row align-items-center mb-4 ">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" placeholder="Your Email" value="{{ $customers->email }}"/>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger m-2">{{ $message }}</div>
                                            @enderror

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" placeholder="Password" value="{{ $customers->password }}"/>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger m-2">{{ $message }}</div>
                                            @enderror

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        name="address" placeholder="Địa chỉ" value="{{ $customers->address }}"/>
                                                </div>
                                            </div>
                                            @error('address')
                                                <div class="alert alert-danger m-2">{{ $message }}</div>
                                            @enderror
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="number"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" placeholder="Số điện thoại" value="{{ $customers->phone }}"/>
                                                </div>
                                            </div>
                                            @error('phone')
                                                <div class="alert alert-danger m-2">{{ $message }}</div>
                                            @enderror


                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">Cập nhật</button>
                                            </div>

                                        </form>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
