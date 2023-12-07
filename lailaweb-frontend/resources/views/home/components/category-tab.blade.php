<section class="mb-5">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
        @foreach ($categories as $key => $value)
            <li class="nav-item" role="presentation">
                <a data-mdb-tab-init class="nav-link {{ $key == 0 ? 'active' : '' }}"
                    id="category_tab_{{ $value->id }}" href="#category_content_{{ $value->id }}" role="tab"
                    aria-controls="category_content_{{ $value->id }}"
                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    <i class="fas fa-chart-pie fa-fw me-2"></i>{{ $value->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="myTabContent">
        @foreach ($categories as $index => $item)
            <div class="tab-pane fade @if ($index === 0) show active @endif"
                id="category_content_{{ $item->id }}" role="tabpanel"
                aria-labelledby="category_tab_{{ $item->id }}">
                <!-- Nội dung tương ứng với mỗi tab -->
                <div class="row">
                    @foreach ($item->categoryChil as $categoryParent)
                        @foreach ($categoryParent->products as $productChild)
                            <div class="col-md-3 p-2">
                                <div class="card text-center border border-primary shadow-0 ">
                                    <!-- Nội dung sản phẩm -->
                                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                        <img src="{{ config('app.baseUrl') . $productChild->feature_image_path }}"
                                            class="img-card" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-header">{{ $productChild->name }}</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $productChild->price }}</h5>
                                        <p class="card-text">
                                            Some quick example text to build on the card title and make up the bulk
                                            of
                                            the card's content.
                                        </p>
                                        <button type="button" class="btn btn-primary">Button</button>
                                    </div>
                                    <!-- Kết thúc nội dung sản phẩm -->
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- Kết thúc nội dung tương ứng với mỗi tab -->
            </div>
        @endforeach
    </div>
    <!-- Tabs content -->
</section>
