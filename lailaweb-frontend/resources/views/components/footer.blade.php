<!-- Footer -->
<footer class="page-footer text-center text-md-left stylish-color-dark pt-0 mb-0">

    <div style="background-color: #4285f4;">

        <div class="container">

            <!-- Grid row -->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

                    <h6 class="mb-0 white-text">Cảm ơn các bạn đã ghé thăm</h6>

                </div>
                <!-- Grid column -->


            </div>
            <!-- Grid row -->

        </div>

    </div>

    <!-- Footer Links -->
    <div class="container mt-5 mb-4 text-center text-md-left">

        <div class="row mt-3">

            <!-- First column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>Fishi'Sop</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p>Shop cá cảnh Online Fishi'Sop chuyên cung cấp các dòng các thủy sinh, tép cảnh, cá cảnh nhập khẩu.</p>

            </div>
            <!-- First column -->

            <!-- Second column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>Hỗ trợ khách hàng</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><a href="#!">Tra cứu đơn hàng</a></p>

                <p><a href="#!">Liên hệ</a></p>

                <p><a href="#!">Chính sách vận chuyển</a></p>

            </div>
            <!-- Second column -->

            <!-- Third column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>Tìm hiểu thêm</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><a href="{{ route('intro') }}">Giới thiệu</a></p>

                <p><a href="#!">Sản phẩm</a></p>

                <p><a href="#!">Thông tin chung</a></p>

                <p><a href="#!">Quy mô trang trại</a></p>

            </div>
            <!-- Third column -->

            <!-- Fourth column -->
            <div class="col-md-4 col-lg-3 col-xl-3">

                <h6 class="text-uppercase font-weight-bold"><strong>Kết nối</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><i class="fas fa-home mr-3"></i>{{ getConfigValueFromSettingTable('address') }}</p>

                <p><i class="fas fa-envelope mr-3"></i> {{ getConfigValueFromSettingTable('Email') }}</p>

                <p><i class="fas fa-phone mr-3"></i>{{ getConfigValueFromSettingTable('Phone-contact') }}</p>

                <p><a href="{{ getConfigValueFromSettingTable('github_link') }}"
                        class="fa-brands fa-github pr-3"></a>LinkGitHub</p>

            </div>
            <!-- Fourth column -->

        </div>

    </div>
    <!-- Footer Links -->
</footer>
<!-- Footer -->
