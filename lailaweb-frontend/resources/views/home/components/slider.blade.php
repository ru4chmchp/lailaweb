@php
    $baseUrl = 'http://localhost:8081'
@endphp

<div class="col-lg-8 col-md-12 mb-3 pb-lg-2">

    <!-- Image -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $value)
                
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="d-block w-100 height_fish " src="{{ $baseUrl . $value->image_path }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>{{ $value->name }}</h4>
                    <p>{{ $value->description }}</p>
                </div>
            </div>
            
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Image -->

</div>
