<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
        <div class="container">
            <form method="POST" action="/order/create/action">
                <input type="hidden" name="method" value="POST" id="">
                <!-- Địa chỉ giao hàng -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Địa Chỉ Giao Hàng</h4>
                    </legend>
                    <hr>

                    <div class="row mb-3">
                        <label for="fullName" class="col-sm-3 col-form-label">Họ và tên người nhận</label>
                        <div class="col-sm-9">
                            <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Nhập họ và tên người nhận" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Ví dụ: 0979123xxx (10 ký tự số)" required>
                        </div>
                    </div>

                    <div>
                        <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                            <option value="" selected>Chọn tỉnh thành</option>
                            <!-- Tỉnh thành sẽ được điền động từ cơ sở dữ liệu -->
                        </select>

                        <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                            <!-- Quận huyện sẽ được điền động từ API -->
                        </select>

                        <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                            <!-- Phường xã sẽ được điền động từ API -->
                        </select>
                    </div> <br>
                    <div class="row mb-3">
                        <label for="street" class="col-sm-3 col-form-label">Địa chỉ nhận hàng</label>
                        <div class="col-sm-9">
                            <input type="text" name="street" class="form-control" id="street" placeholder="Nhập địa chỉ nhận hàng" required>
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
                        <input class="form-check-input" type="radio" name="shippingMethod" id="standardShipping" value="standard" checked>
                        <label class="form-check-label" for="standardShipping">
                            Giao hàng tiêu chuẩn: 32.000 đ
                        </label>
                    </div>
                </fieldset>

                <!-- Phương thức thanh toán -->
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto px-3">
                        <h4>Phương Thức Thanh Toán</h4>
                    </legend>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="vnpay" value="vnpay">
                        <label class="form-check-label d-flex align-items-center" for="vnpay">
                            <img width="40px" height="20px" src="https://thuonghieumanh.vneconomy.vn/upload/vnpay.png" alt="VNPay" class="me-3">
                            VNPay
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" value="Thanh toán khi nhận hàng" checked>
                        <label class="form-check-label" for="cashOnDelivery">
                            Thanh toán khi nhận hàng
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="visa" value="visa">
                        <label class="form-check-label d-flex align-items-center" for="visa">
                            <img width="50px" height="30px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGYv-KoeVEikzOcRP_Jv66wfxg_mLv0zWZMw&s" alt="Visa" class="me-3">
                            Visa/MB Bank
                        </label>
                    </div>
                </fieldset>

                <!-- Order Review -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        KIỂM TRA LẠI ĐƠN HÀNG
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        // Mảng sản phẩm gắn cứng
                        $products = [
                            [
                                'image' => '2.jpg',
                                'name' => 'Dám Nghĩ Lại',
                                'quantity' => 1,
                                'price' => 126000
                            ],
                            [
                                'image' => '3.jpg',
                                'name' => 'Sản phẩm 2',
                                'quantity' => 2,
                                'price' => 100000
                            ]
                        ];

                        // Tính tổng tiền
                        $totalAmount = 0;

                        // Tạo mảng các hàng đơn hàng để hiển thị
                        $productItems = array_map(function ($product) use (&$totalAmount) {
                            // Tính tổng tiền của sản phẩm
                            $productTotal = $product['price'] * $product['quantity'];
                            // Cộng tổng tiền vào tổng chung
                            $totalAmount += $productTotal;

                            // Trả về dữ liệu sản phẩm dưới dạng mảng để dễ dàng hiển thị sau này
                            return [
                                'image' => $product['image'],
                                'name' => $product['name'],
                                'quantity' => $product['quantity'],
                                'price' => number_format($productTotal),
                            ];
                        }, $products);

                        // Hiển thị thông tin sản phẩm
                        foreach ($productItems as $item) {
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="width: 80px; height: auto;" class="me-3 border rounded">
                                    <div>
                                        <h6 class="mb-1"><?= $item['name'] ?></h6>
                                        <small class="text-muted">Số lượng <?= $item['quantity'] ?></small>
                                    </div>
                                </div>
                                <span class="fw-bold text-danger"><?= $item['price'] ?> đ</span>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- Payment Summary -->
                <div class="card shadow-sm">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Thành tiền</span>
                            <span class="text-danger"><?= number_format($totalAmount) ?> đ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Phí vận chuyển</span>
                            <span>32.000 đ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Tổng Số Tiền</span>
                            <span class="text-danger"><?= number_format($totalAmount + 32000) ?> đ</span>
                        </li>
                    </ul>
                </div>


                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="termsCheckbox" required>
                    <label class="form-check-label" for="termsCheckbox">
                        Bạn đồng ý với <a href="#" class="text-decoration-none">Điều kiện và Điều khoản</a> của chúng tôi.
                    </label>
                </div>

                <!-- Confirm Payment Button -->
                <div class="mt-3 mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger px-4 py-2">Xác nhận thanh toán</button>
                </div>
            </form>
        </div>

<?php
    }
}
?>