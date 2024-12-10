<?php

namespace App\Views\Client\Pages\Contact;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {


?>
<div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="text-center my-5">
        <h1 class="fw-bold">Liên Hệ Với Chúng Tôi</h1>
        <p class="text-muted">Hãy để chúng tôi giúp bạn. Điền thông tin bên dưới hoặc liên hệ trực tiếp qua thông
            tin liên lạc.</p>
    </div>

    <section class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h2 class="mb-4">Gửi Thông Tin</h2>
                    <form action="/addcontact" method="post" id="contactForm" class="needs-validation" novalidate>
                        <!-- Trường Họ và Tên -->
                         <input   type="hidden" name="method" value="POST">

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên của bạn"
                                required>
                            <div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn"
                                required>
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ.</div>
                        </div>

                        <!-- Trường Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn"
                                required>
                            <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề của bạn"
                                required>
                            <div class="invalid-feedback">Vui lòng nhập tiêu đề.</div>
                        </div>

                        <!-- Trường Tin Nhắn -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Tin Nhắn</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Nhập tin nhắn của bạn"
                                required></textarea>
                            <div class="invalid-feedback">Vui lòng nhập tin nhắn.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Gửi Thông Tin</button>
                    </form>
                </div>
            </div>

            <!-- Thông tin liên hệ và các mạng xã hội -->
            <div class="col-lg-6">
                <h2 class="mb-4">Thông Tin Liên Lạc</h2>
                <div class="mb-3">
                    <p><i class="fa fa-map-marker text-primary me-2"></i> Trường Cao đẳng FPT Polytechnic, Toà nhà FPT
                        Polytechnic, Đ. Số 22, Thường Thạnh, Cái Răng, Cần Thơ, Việt Nam</p>
                    <p><i class="fa fa-phone text-primary me-2"></i> Điện thoại: 123 456 789</p>
                    <p><i class="fa fa-envelope text-primary me-2"></i> Email: nhatphat@gmail.com</p>
                </div>

                <!-- Liên kết mạng xã hội -->
                <h3 class="mt-4">Kết nối với chúng tôi</h3>
                <div class="d-flex justify-content-start">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/NNPFJ" class="btn btn-outline-primary me-2" target="_blank">
                        <i class="fa fa-facebook-f"></i> Facebook
                    </a>
                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@is_ngphat" class="btn btn-outline-primary me-2" target="_blank">
                        <i class="fa fa-tiktok"></i> TikTok
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/is.hpat_05/" class="btn btn-outline-primary" target="_blank">
                        <i class="fa fa-instagram"></i> Instagram
                    </a>
                </div>

                <div class="ratio ratio-16x9 mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.420494742044!2d105.7556524747934!3d9.982081490122432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731830236530!5m2!1svi!2s"
                        allowfullscreen="" loading="lazy" style="border:0;"></iframe>
                </div>
            </div>
        </div>
    </section>
    <?php


  }
}