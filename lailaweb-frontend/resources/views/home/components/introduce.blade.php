<div class="row border-intro">

    <!-- Grid column for image -->
    <!-- Image -->

    @php
        $baseUrl = config('app.baseUrl');
    @endphp
    <img src="{{ $baseUrl . $newslettersid3->image_path }}" class="img-intro col-md-6 pl-0" alt="sample image">

    <!-- Image -->

    <!-- Grid column for content -->
    <div class="col-md-6">
        <!-- Content -->
        <div>
            <!-- Your content here -->
            <!-- Example content -->
            <h2 class="h2-main">{{ $newslettersid3->name }}</h2>
            <p class="p-main">{{ $newslettersid3->content }}</p>
            <a href="{{ route('intro') }}" class="button-56 float-right">Bấm vào đây</a>
            <!-- End of example content -->
        </div>
        <!-- End of content -->
    </div>

</div>
