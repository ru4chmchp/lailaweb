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
            <h2>{{ $newslettersid3->name }}</h2>
            <p>{{ $newslettersid3->content }}</p>
            <button href="" class="button-56">Click here</button>
            <!-- End of example content -->
        </div>
        <!-- End of content -->
    </div>

</div>
