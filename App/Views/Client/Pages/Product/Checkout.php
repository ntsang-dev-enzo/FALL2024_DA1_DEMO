<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        <div class="container">
            <form>
                <!-- Địa chỉ giao hàng -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Địa Chỉ Giao Hàng</h4>
                    </legend>
                    <hr>

                    <div class="row mb-3 align-items-center">
                        <label for="fullName" class="col-sm-3 col-form-label">Họ và tên người nhận</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullName" placeholder="Nhập họ và tên người nhận">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Nhập email">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" placeholder="Ví dụ: 0979123xxx (10 ký tự số)">
                        </div>
                    </div>


                    <div>
                        <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>

                        <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>

                        <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </div> <br>



                    <div class="row mb-3 align-items-center">
                        <label for="address" class="col-sm-3 col-form-label">Địa chỉ nhận hàng</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ nhận hàng">
                        </div>
                    </div>
                </fieldset>

                <!-- Phương thức vận chuyển -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Phương Thức Vận Chuyển</h4>
                    </legend>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="standardShipping" checked>
                        <label class="form-check-label" for="standardShipping">
                            Giao hàng tiêu chuẩn: 32.000 đ<br>
                            <span class="text-muted">Dự kiến giao: Thứ Tư - 20/11</span>
                        </label>
                    </div>
                </fieldset>

                <!-- Phương thức thanh toán -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h3>Phương Thức Thanh Toán</h3>
                    </legend>
                    <hr>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="vnpay">
                        <label class="form-check-label d-flex align-items-center" for="vnpay">
                            <img width="40px" height="20px" src="https://thuonghieumanh.vneconomy.vn/upload/vnpay.png" alt="VNPay" class="me-3">
                            VNPay <a href="#" class="ms-2 text-primary">Chi tiết</a>
                        </label>
                        <p class="ms-5 text-warning">KH Đăng ký/ Đăng nhập tài khoản tại ST STORE,Nhập mã "SPPFHS11": Giảm 10K cho ĐH 200K - Nhập mã tại SHOPEEPAY - Số lượng có hạn</p>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" checked>
                        <label class="form-check-label d-flex align-items-center" for="cashOnDelivery">
                            <img width="40px" height="20px" src="https://nhualaysang.com/uploads/images/bai-viet/thanhtoan-vinlite1.png" alt="Cash" class="me-3">
                            Thanh toán bằng tiền mặt khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="visa">
                        <label class="form-check-label d-flex align-items-center" for="visa">
                            <img width="50px" height="30px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGYv-KoeVEikzOcRP_Jv66wfxg_mLv0zWZMw&s" alt="Visa" class="me-3">
                            MB Bank
                        </label>
                        <!-- Mã QR -->
                        <img id="qr" src="https://img.vietqr.io/image/mbbank-0939135223-compact2.jpg?amount=20000&addInfo=Trung%20Sang%20chuyen%20tien&accountName=NGUYEN%20TRUNG%20SANG" alt="QR Code" style="display: none; margin-top: 10px;">
                    </div>
                </fieldset>

                <!-- Mã khuyến mãi/Mã quà tặng -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Mã Khuyến Mãi/Mã Quà Tặng</h4>
                    </legend>
                    <hr>
                    <div class="row align-items-center">
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="promoCode" placeholder="Nhập mã khuyến mãi/Quà tặng">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-primary">Áp dụng</button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#" class="text-decoration-none">Chọn mã khuyến mãi</a>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- Nhận quà -->
        <div class="container my-4">
            <!-- Gift Notification -->
            <div class="alert alert-warning border rounded d-flex align-items-center">
                <i class="bi bi-gift me-2"></i>
                <span>Bạn chưa đủ điều kiện để chọn quà</span>
                <a href="#" class="ms-auto text-decoration-none">Chọn quà</a>
            </div>

            <!-- Other Information -->
            <div class="mb-4">
                <h5 class="mb-3">THÔNG TIN KHÁC</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="noteCheckbox">
                    <label class="form-check-label" for="noteCheckbox">Ghi chú</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invoiceCheckbox">
                    <label class="form-check-label" for="invoiceCheckbox">Xuất hóa đơn GTGT <a href="#" class="text-decoration-none">Chi tiết</a></label>
                </div>
                <p class="text-danger mt-2">*Từ ngày 01/11/2020, Công ty Fahasa không giải quyết việc xuất lại hóa đơn cho các trường hợp Quý khách không đăng ký thông tin</p>
            </div>

            <!-- Order Review -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    KIỂM TRA LẠI ĐƠN HÀNG
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <img src="2.jpg" alt="Dám Nghĩ Lại" style="width: 80px; height: auto;" class="me-3 border rounded">
                            <div>
                                <h6 class="mb-1">Dám Nghĩ Lại</h6>
                                <small class="text-muted">Số lượng 1</small>
                            </div>
                        </div>
                        <span class="fw-bold text-danger">126.000 đ</span>
                    </li>
                </ul>
            </div>

            <!-- Payment Summary -->
            <div class="card shadow-sm">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Thành tiền</span>
                        <span class="">126.000 đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Phí vận chuyển (Giao hàng tiêu chuẩn)</span>
                        <span class="">32.000 đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Tổng Số Tiền (gồm VAT)</span>
                        <span class="text-danger">158.000 đ</span>
                    </li>
                </ul>
            </div>

            <div>

                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="invoiceCheckbox">
                    <label class="form-check-label" for="invoiceCheckbox">Bằng việc tiến hành mua hàng.Bạn đồng ý với <a href="#" class="text-decoration-none">Điều kiện và điều khoản với ST STORE</a> </label>
                    </label>
                </div>
            </div>

            <!-- Confirm Payment Button -->
            <div class="mt-3 d-flex justify-content-end">
                <button class="btn btn-danger px-4 py-2">Xác nhận thanh toán</button>
            </div>


        </div>

<?php

    }
}
