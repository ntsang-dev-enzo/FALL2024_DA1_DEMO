<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Cart extends BaseView
{
    public static function render($data = null)
    {

?>


        <div class="container">
            <div class="cart-section">
                <h2>Giỏ Hàng (3 sản phẩm)</h2>
                <label>
                    <input type="checkbox">
                    Chọn tất cả (3 sản phẩm)
                </label>
                <div class="cart-item">
                    <input type="checkbox">
                    <img src="/public/assets/client/images/8935278607311.webp" alt="Book Image">
                    <div class="item-details">
                        <p>Nước Mỹ Trong Mắt Trump - The United States Of Trump : How The President Really Sees America</p>
                        <p><span class="discount-price">166,320 đ</span> <span class="original-price">198,000 đ</span></p>
                    </div>
                    <div class="quantity">
                        <button>-</button>
                        <input type="number" value="1">
                        <button>+</button>
                    </div>

                    <button class="delete-btn">🗑️</button>
                </div>

                <div class="cart-item">
                    <input type="checkbox">
                    <img src="/public/assets/client/images/frame_8936043158496.webp" alt="Mini Tree Image">
                    <div class="item-details">
                        <p>Cây Thông Mini 30 cm - Chaang Chiia LP-M4</p>
                        <p><span class="discount-price">30,340 đ</span> <span class="original-price">37,000 đ</span></p>
                    </div>
                    <div class="quantity">
                        <button>-</button>
                        <input type="number" value="1">
                        <button>+</button>
                    </div>

                    <button class="delete-btn">🗑️</button>
                </div>

                <div class="cart-item">
                    <input type="checkbox">
                    <img src="/public/assets/client/images/image_195509_1_56100.webp" alt="Book Image">
                    <div class="item-details">
                        <p>Không Diệt Không Sinh Đừng Sợ Hãi (Tái Bản 2022)</p>
                        <p><span class="discount-price">71,500 đ</span> <span class="original-price">110,000 đ</span></p>
                    </div>
                    <div class="quantity">
                        <button>-</button>
                        <input type="number" value="1">
                        <button>+</button>
                    </div>
                    <button class="delete-btn">🗑️</button>
                </div>
            </div>

            <div class="sidebar">
                <div class="discount-section">
                    <h3>Khuyến Mãi</h3>
                    <p>Mã Giảm 10K - Toàn Sàn</p>
                    <progress max="130000" value="0"></progress>
                    <button class="btn btn-primary">Mua Thêm</button>
                </div>
                <div class="gift-section">
                    <h3>Nhận quà</h3>
                    <button class="btn btn-secondary" >Chọn quà</button>
                </div>
                <div class="summary">
                    <p>Thành tiền: 0 đ</p>
                    <p><strong>Tổng Số Tiền (gồm VAT): 0 đ</strong></p>
                   
                    <a href="/products/thanhtoan" class="btn btn-success col-12">Thanh Toán</a>
                    <p class="note">Giảm giá trên web chỉ áp dụng cho bán lẻ</p>
                </div>
            </div>
        </div>

<?php

    }
}
