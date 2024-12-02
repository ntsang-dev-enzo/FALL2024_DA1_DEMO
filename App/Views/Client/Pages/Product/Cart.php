<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Cart extends BaseView
{
    public static function render($data = null)
    {

?>
         <div class="container my-4">
      <h2>Giỏ Hàng (<span id="cart-count">4</span> sản phẩm)</h2>
      <div class="row">
        <!-- Products Section -->
        <div class="col-md-8" id="cart-items">
          <!-- Product 1 -->
          <div class="card mb-3 cart-item" data-price="215100">
            <div class="row g-0 align-items-center w-75">
              <div class="col-md-1">
                <input type="checkbox" class="select-item" />
              </div>
              <div class="col-md-2">
                <img src="https://cdn0.fahasa.com/media/catalog/product/i/m/image_188285.jpg" class="img-fluid rounded" alt="Thú Bông Capybara" />
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <p class="card-text">Chuyện Con Mèo Dạy Hải Âu Bay (Tái Bản 2019)</p>
                  <p><span class="text-danger fw-bold">215,100 đ</span></p>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <button class="btn btn-outline-secondary btn-sm quantity-decrease">-</button>
                <input type="number" class="form-control d-inline text-center mx-1 quantity-input" value="1" style="width: 50px;" />
                <button class="btn btn-outline-secondary btn-sm quantity-increase">+</button>
              </div>
              <div class="col-md-2 text-center">
                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
          <div class="card mb-3 cart-item" data-price="215100">
            <div class="row g-0 align-items-center w-75">
              <div class="col-md-1">
                <input type="checkbox" class="select-item" />
              </div>
              <div class="col-md-2">
                <img src="https://cdn0.fahasa.com/media/catalog/product/i/m/image_195509_1_56100.jpg" class="img-fluid rounded" alt="Thú Bông Capybara" />
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <p class="card-text">Nước Mỹ Trong Mắt Trump - The United States Of Trump : How The President Really Sees America)</p>
                  <p><span class="text-danger fw-bold">166.320 đ</span></p>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <button class="btn btn-outline-secondary btn-sm quantity-decrease">-</button>
                <input type="number" class="form-control d-inline text-center mx-1 quantity-input" value="1" style="width: 50px;" />
                <button class="btn btn-outline-secondary btn-sm quantity-increase">+</button>
              </div>
              <div class="col-md-2 text-center">
                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
          <div class="card mb-3 cart-item" data-price="215100">
            <div class="row g-0 align-items-center w-75">
              <div class="col-md-1">
                <input type="checkbox" class="select-item" />
              </div>
              <div class="col-md-2">
                <img src="https://cdn0.fahasa.com/media/catalog/product/9/7/9780593736814_1.jpg" class="img-fluid rounded" alt="Thú Bông Capybara" />
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <p class="card-text">Nexus - A Brief History Of Information Networks From The Stone Age To AI</p>
                  <p><span class="text-danger fw-bold">381.750 đ</span></p>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <button class="btn btn-outline-secondary btn-sm quantity-decrease">-</button>
                <input type="number" class="form-control d-inline text-center mx-1 quantity-input" value="1" style="width: 50px;" />
                <button class="btn btn-outline-secondary btn-sm quantity-increase">+</button>
              </div>
              <div class="col-md-2 text-center">
                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
          <div class="card mb-3 cart-item" data-price="215100">
            <div class="row g-0 align-items-center w-75">
              <div class="col-md-1">
                <input type="checkbox" class="select-item" />
              </div>
              <div class="col-md-2">
                <img src="https://cdn0.fahasa.com/media/catalog/product/n/x/nxbtre_full_25342024_023450.jpg" class="img-fluid rounded" alt="Thú Bông Capybara" />
              </div>
              <div class="col-md-4">
                <div class="card-body">
                  <p class="card-text">Hồi Ký Alex Ferguson (Tái Bản 2024)</p>
                  <p><span class="text-danger fw-bold">175.500 đ</span></p>
                </div>
              </div>
              <div class="col-md-3 text-center">
                <button class="btn btn-outline-secondary btn-sm quantity-decrease">-</button>
                <input type="number" class="form-control d-inline text-center mx-1 quantity-input" value="1" style="width: 50px;" />
                <button class="btn btn-outline-secondary btn-sm quantity-increase">+</button>
              </div>
              <div class="col-md-2 text-center">
                <button class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
         
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
          <!-- Promotion Section -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Khuyến Mãi</h5>
              <p>Mã Giảm 10K - Toàn Sàn</p>
              <div class="progress mb-3">
                <div id="promotion-progress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="130000"></div>
              </div>
              <p id="promotion-message">Mua thêm <span id="amount-left">130,000</span> đ để nhận mã giảm giá.</p>
              <button class="btn btn-outline-primary w-100">Mua Thêm</button>
            </div>
          </div>

          <!-- Gift Section -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Nhận Quà</h5>
              <p id="gift-message" class="text-muted">Bạn chưa đủ điều kiện để nhận quà.</p>
              <button class="btn btn-success w-100" id="redeem-gift" disabled>Nhận Quà</button>
            </div>
          </div>

          <!-- Summary Section -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tổng Kết</h5>
              <p>Thành tiền: <span id="total-price">0</span> đ</p>
              <p><strong>Tổng Số Tiền (gồm VAT): <span id="total-vat-price">0</span> đ</strong></p>
              <button class="btn btn-success col-12">Thanh Toán</button>
              <p class="text-muted mt-2">Giảm giá trên web chỉ áp dụng cho bán lẻ.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const promotionThreshold = 130000;
        const giftThreshold = 200000;
        const cartItemsContainer = document.getElementById("cart-items");
        const cartCountElement = document.getElementById("cart-count");
        const totalPriceElement = document.getElementById("total-price");
        const totalVatPriceElement = document.getElementById("total-vat-price");
        const promotionProgress = document.getElementById("promotion-progress");
        const amountLeftElement = document.getElementById("amount-left");
        const promotionMessage = document.getElementById("promotion-message");
        const giftMessage = document.getElementById("gift-message");
        const redeemGiftButton = document.getElementById("redeem-gift");

        function updateTotalPrice() {
          let total = 0;
          let count = 0;

          document.querySelectorAll(".cart-item").forEach((item) => {
            const checkbox = item.querySelector(".select-item");
            if (checkbox.checked) {
              const price = parseInt(item.dataset.price, 10);
              const quantity = parseInt(item.querySelector(".quantity-input").value, 10);
              total += price * quantity;
            }
            count++;
          });

          cartCountElement.textContent = count;
          totalPriceElement.textContent = total.toLocaleString();
          totalVatPriceElement.textContent = total.toLocaleString();

          // Update Promotion
          const progress = Math.min((total / promotionThreshold) * 100, 100);
          promotionProgress.style.width = `${progress}%`;
          const amountLeft = Math.max(promotionThreshold - total, 0);
          amountLeftElement.textContent = amountLeft.toLocaleString();
          promotionMessage.style.display = amountLeft > 0 ? "block" : "none";

          // Update Gift Eligibility
          if (total >= giftThreshold) {
            giftMessage.textContent = "Chúc mừng! Bạn đã đủ điều kiện nhận quà.";
            redeemGiftButton.disabled = false;
          } else {
            giftMessage.textContent = "Bạn chưa đủ điều kiện để nhận quà.";
            redeemGiftButton.disabled = true;
          }
        }

        document.addEventListener("click", (e) => {
          if (e.target.classList.contains("delete-btn")) {
            const item = e.target.closest(".cart-item");
            item.remove();
            updateTotalPrice();
          }

          if (e.target.classList.contains("quantity-increase") || e.target.classList.contains("quantity-decrease")) {
            const input = e.target.closest(".cart-item").querySelector(".quantity-input");
            if (e.target.classList.contains("quantity-increase")) {
              input.value = parseInt(input.value, 10) + 1;
            } else if (parseInt(input.value, 10) > 1) {
              input.value = parseInt(input.value, 10) - 1;
            }
            updateTotalPrice();
          }
        });

        document.querySelectorAll(".select-item").forEach((checkbox) => {
          checkbox.addEventListener("change", updateTotalPrice);
        });

        updateTotalPrice();
      });
    </script>

<?php

    }
}
