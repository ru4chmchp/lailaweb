<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ $name === 'Dashboard' ? route('dashboard') : route(strtolower($name) . '.index') }}">{{ $name }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $key }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
