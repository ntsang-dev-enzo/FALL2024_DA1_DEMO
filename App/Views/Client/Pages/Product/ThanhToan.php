<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class ThanhToan extends BaseView
{
  public static function render($data = null)
  {


?>

<script src="https://esgoo.net/scripts/jquery.js"></script>
    <div class="container my-5">
        <form>
            <!-- Địa chỉ giao hàng -->
            <fieldset class="border p-4 mb-4">
                <legend class="w-auto px-3"><h4>Địa Chỉ Giao Hàng</h4></legend> <hr>

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
                 <div class="css_select_div">
                     <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                         <option value="0">Tỉnh Thành</option>
                     </select> 
                     <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                         <option value="0">Quận Huyện</option>
                     </select> 
                     <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                         <option value="0">Phường Xã</option>
                     </select>
                 </div>  <br>

                

                <div class="row mb-3 align-items-center">
                    <label for="address" class="col-sm-3 col-form-label">Địa chỉ nhận hàng</label> 
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ nhận hàng">
                    </div>
                </div>
            </fieldset>

            <!-- Phương thức vận chuyển -->
            <fieldset class="border p-4 mb-4">
                <legend class="w-auto px-3"><h4>Phương Thức Vận Chuyển</h4></legend><hr>
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
                <legend class="w-auto px-3"><h3>Phương Thức Thanh Toán</h3></legend> <hr>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="vnpay">
                    <label class="form-check-label d-flex align-items-center" for="vnpay">
                        <img width="40px" height="20px" src="https://thuonghieumanh.vneconomy.vn/upload/vnpay.png" alt="VNPay" class="me-3">
                        VNPay <a href="#" class="ms-2 text-primary">Chi tiết</a>
                    </label>
                    <p class="ms-5 text-warning">KH Đăng ký/ Đăng nhập tài khoản tại ST STORE,Nhập mã "SPPFHS11": Giảm 10K cho ĐH 200K - Nhập mã tại SHOPEEPAY - Số lượng có hạn</p>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="shopeePay">
                    <label class="form-check-label d-flex align-items-center" for="shopeePay">
                        <img width="40px" height="20px" src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/398/2023/09/10/Desain-tanpa-judul-10-3396920696.png" alt="ShopeePay" class="me-3">
                        Ví ShopeePay <a href="#" class="ms-2 text-primary">Chi tiết</a>
                    </label>
                    <p class="ms-5 text-warning">KH Đăng ký/ Đăng nhập tài khoản tại ST STORE,Nhập mã "SPPFHS11": Giảm 10K cho ĐH 200K - Nhập mã tại SHOPEEPAY - Số lượng có hạn</p>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="momo">
                    <label class="form-check-label d-flex align-items-center" for="momo">
                        <img width="40px" height="20px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD9puJM2vp6mPajZO1JoGyVFyEgj-wdqQM6-e_pWTMMbmg39351A-ZCwXyMHQ5lr5BdjQ&usqp=CAU" alt="Momo" class="me-3">
                        Ví Momo
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" checked>
                    <label class="form-check-label d-flex align-items-center" for="cashOnDelivery">
                        <img width="40px" height="20px" src="https://nhualaysang.com/uploads/images/bai-viet/thanhtoan-vinlite1.png" alt="Cash" class="me-3">
                        Thanh toán bằng tiền mặt khi nhận hàng
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="atm">
                    <label class="form-check-label d-flex align-items-center" for="atm">
                        <img width="40px" height="20px" src="https://i.pinimg.com/736x/f9/61/43/f96143b89ed4fd398fd2d7c0f678c57e.jpg" alt="ATM" class="me-3">
                        ATM / Internet Banking
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="visa">
                    <label class="form-check-label d-flex align-items-center" for="visa">
                        <img width="50px" height="30px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGYv-KoeVEikzOcRP_Jv66wfxg_mLv0zWZMw&s" alt="Visa" class="me-3">
                        Visa / Master / JCB
                    </label>
                </div>
            </fieldset>

            <!-- Mã khuyến mãi/Mã quà tặng -->
            <fieldset class="border p-4 mb-4">
                <legend class="w-auto px-3"><h4>Mã Khuyến Mãi/Mã Quà Tặng</h4></legend> <hr>
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
<!-- thành tiền -->
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
                <button class="btn confirm-button px-4 py-2">Xác nhận thanh toán</button>
            </div>
            

        </div>
    
    <!-- Bootstrap JS -->

<?php


  }
}
