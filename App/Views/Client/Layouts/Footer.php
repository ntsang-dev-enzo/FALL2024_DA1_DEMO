<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <img style="width:200px" src="/public/assets/client/img/Borcelle_Cookies-removebg-preview (1).png" alt="">
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>127 Trường Phước A, <br> Trường Long Tây, Châu Thành A, Hậu Giang</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0704-975-960</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Our Services</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Our Services</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Photo Gallery</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a target="_blank" href="https://www.facebook.com/profile.php?id=100084194697570">Tiệm bánh THANH XUÂN</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a target="_blank" href="https://www.facebook.com/deverenzo05">NguyenTrungSang</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

        <script>
document.addEventListener("DOMContentLoaded", function () {
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");

    var cityNameInput = document.getElementById("cityName");
    var districtNameInput = document.getElementById("districtName");
    var wardNameInput = document.getElementById("wardName");

    fetch("https://provinces.open-api.vn/api/p/")
        .then(response => response.json())
        .then(data => {
            console.log("Tỉnh thành:", data);
            data.forEach(city => {
                let option = document.createElement("option");
                option.value = city.code;
                option.textContent = city.name;
                citis.appendChild(option);
            });
        });

    citis.addEventListener("change", function () {
        let cityCode = this.value;
        let cityName = this.options[this.selectedIndex].text;
        console.log("Chọn tỉnh:", cityName);
        districts.innerHTML = '<option value="" selected>Chọn quận huyện</option>';
        wards.innerHTML = '<option value="" selected>Chọn phường xã</option>';
        cityNameInput.value = cityName;

        if (cityCode) {
            fetch(`https://provinces.open-api.vn/api/p/${cityCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    console.log("Quận huyện:", data.districts);
                    if (data.districts) {
                        data.districts.forEach(district => {
                            let option = document.createElement("option");
                            option.value = district.code;
                            option.textContent = district.name;
                            districts.appendChild(option);
                        });
                    }
                });
        }
    });

    districts.addEventListener("change", function () {
        let districtCode = this.value;
        let districtName = this.options[this.selectedIndex].text;
        console.log("Chọn quận:", districtName);
        wards.innerHTML = '<option value="" selected>Chọn phường xã</option>';
        districtNameInput.value = districtName;

        if (districtCode) {
            fetch(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    console.log("Phường xã:", data.wards);
                    if (data.wards) {
                        data.wards.forEach(ward => {
                            let option = document.createElement("option");
                            option.value = ward.name;
                            option.textContent = ward.name;
                            wards.appendChild(option);
                        });
                    }
                });
        }
    });

    wards.addEventListener("change", function () {
        let wardName = this.options[this.selectedIndex].text;
        console.log("Chọn phường:", wardName);
        wardNameInput.value = wardName;
    });
});


        </script>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script src="/public/assets/client/lib/wow/wow.min.js"></script>
        <script src="/public/assets/client/lib/easing/easing.min.js"></script>
        <script src="/public/assets/client/lib/waypoints/waypoints.min.js"></script>
        <script src="/public/assets/client/lib/counterup/counterup.min.js"></script>
        <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="/public/assets/client/app.js"></script>
        <script src="/public/assets/client/js/main.js"></script>

        </body>

        </html>
<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>