<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Models\Product;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>


<div class="container my-5">
    <div class="row">
        
        <div class="col-md-5">
            <div class="card">
                <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8935280400733.jpg" class="card-img-top" alt="Product Image">
                
            </div>
        </div>

       
        <div class="col-md-7">
            <h2 class="fw-bold">7 Thói Quen Hiệu Quả - The 7 Habits Of Highly Effective People</h2>
            <p class="text-muted">Tác giả: Stephen R Covey</p>
            <p class="text-muted">Hình thức bìa: Bìa Cứng</p>
            <h3 class="text-danger">180.000₫ <span class="text-muted text-decoration-line-through">250.000₫</span> <span class="badge bg-warning text-dark">-28%</span></h3>

            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <span class="me-2">Flash Sale</span>
                <div><span id="countdown">01:47:41</span></div>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary btn-lg w-100">Mua ngay</button>
            </div>
            <button class="btn btn-outline-secondary btn-lg w-100 mb-3">Thêm vào giỏ hàng</button>

            <h5>Chính sách ưu đãi của Fahasa</h5>
            <ul class="list-unstyled">
                <li><i class="bi bi-truck me-2"></i> Giao hàng nhanh và uy tín</li>
                <li><i class="bi bi-arrow-repeat me-2"></i> Đổi trả miễn phí toàn quốc</li>
                <li><i class="bi bi-shield-check me-2"></i> Ưu đãi khi mua số lượng lớn</li>
            </ul>

            
            <div class="mt-4">
                <h5>Thông tin vận chuyển</h5>
                <p>Giao hàng đến <strong>Phường Bến Nghé, Quận 1, Hồ Chí Minh</strong> - <a href="#">Thay đổi</a></p>
                <p>Giao hàng tiêu chuẩn - Dự kiến giao Thứ hai - 11/11</p>
            </div>

   
            <div class="mt-4">
                <h5>Ưu đãi liên quan</h5>
                <button class="btn btn-outline-primary btn-sm me-2">Mã giảm 10k</button>
                <button class="btn btn-outline-primary btn-sm me-2">Mã giảm 25k</button>
                <button class="btn btn-outline-primary btn-sm">ShopeePay: giảm 5k</button>
            </div>
        </div>
    </div>

 
    <div class="mt-5 mx-4">
        <h4>Thông tin chi tiết</h4>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row">Mã hàng</th>
                    <td>8935280400733</td>
                </tr>
                <tr>
                    <th scope="row">Tên Nhà Cung Cấp</th>
                    <td>Viện Quản lý PACE</td>
                </tr>
                <tr>
                    <th scope="row">Tác giả</th>
                    <td>Stephen R Covey</td>
                </tr>
                <tr>
                    <th scope="row">Người Dịch</th>
                    <td>Nhiều Người Dịch</td>
                </tr>
                <tr>
                    <th scope="row">NXB</th>
                    <td>Tổng Hợp TPHCM</td>
                </tr>
                
            </tbody>
            
        </table>
    </div>
</div>

<!-- Related Products Section -->  <div class="container"><h4 class="fw-bold">Sách liên quan </h4></div>
<div class="container my-5">
  
  <div class="row">

      <div class="col-md-2">
          <div class="card text-center">
              <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                  <h6 class="card-title">7 Thói Quen Hôn Nhân Hạnh Phúc - The 7 Habits...</h6>
                  <p class="text-danger fw-bold">119.350₫ <span class="text-muted text-decoration-line-through">155.000₫</span></p>
                  <span class="badge bg-danger">-23%</span>
              </div>
          </div>
      </div>


      <div class="col-md-2">
          <div class="card text-center">
              <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                  <h6 class="card-title">Thay Đổi Tư Duy Thay Đổi Cuộc Sống (Tái Bản 2015)</h6>
                  <p class="text-danger fw-bold">162.360₫ <span class="text-muted text-decoration-line-through">198.000₫</span></p>
                  <span class="badge bg-danger">-18%</span>
              </div>
          </div>
      </div>

      <div class="col-md-2">
        <div class="card text-center">
            <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h6 class="card-title">Thay Đổi Tư Duy Thay Đổi Cuộc Sống (Tái Bản 2015)</h6>
                <p class="text-danger fw-bold">162.360₫ <span class="text-muted text-decoration-line-through">198.000₫</span></p>
                <span class="badge bg-danger">-18%</span>
            </div>
        </div>
    </div>

    <div class="col-md-2">
      <div class="card text-center">
          <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
          <div class="card-body">
              <h6 class="card-title">Thay Đổi Tư Duy Thay Đổi Cuộc Sống (Tái Bản 2015)</h6>
              <p class="text-danger fw-bold">162.360₫ <span class="text-muted text-decoration-line-through">198.000₫</span></p>
              <span class="badge bg-danger">-18%</span>
          </div>
      </div>
  </div>

  <div class="col-md-2">
    <div class="card text-center">
        <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
        <div class="card-body">
            <h6 class="card-title">Thay Đổi Tư Duy Thay Đổi Cuộc Sống (Tái Bản 2015)</h6>
            <p class="text-danger fw-bold">162.360₫ <span class="text-muted text-decoration-line-through">198.000₫</span></p>
            <span class="badge bg-danger">-18%</span>
        </div>
    </div>
</div>

<div class="col-md-2">
  <div class="card text-center">
      <img src="/public/assets/client/images/1.jpg" class="card-img-top" alt="Product Image">
      <div class="card-body">
          <h6 class="card-title">Thay Đổi Tư Duy Thay Đổi Cuộc Sống (Tái Bản 2015)</h6>
          <p class="text-danger fw-bold">162.360₫ <span class="text-muted text-decoration-line-through">198.000₫</span></p>
          <span class="badge bg-danger">-18%</span>
      </div>
  </div>
</div>
      


<div class="container my-5 d-flex flex-column">
  <h4 class="fw-bold">Đánh giá sản phẩm</h4>
  <div class="row">
      <div class="col-md-2 text-center">
          <h1 class="display-4">0/5</h1>
          <div class="star-rating">
              <span class="text-muted">(0 đánh giá)</span>
          </div>
      </div>
      <div class="col-md-10">
          <ul class="list-unstyled">
              <li>5 sao <div class="progress"><div class="progress-bar bg-warning" style="width: 0%;"></div></div> 0%</li>
              <li>4 sao <div class="progress"><div class="progress-bar bg-warning" style="width: 0%;"></div></div> 0%</li>
              <li>3 sao <div class="progress"><div class="progress-bar bg-warning" style="width: 0%;"></div></div> 0%</li>
              <li>2 sao <div class="progress"><div class="progress-bar bg-warning" style="width: 0%;"></div></div> 0%</li>
              <li>1 sao <div class="progress"><div class="progress-bar bg-warning" style="width: 0%;"></div></div> 0%</li>
          </ul>
      </div>
  </div>
  <p class="text-center mt-4">Chỉ có thành viên mới có thể viết nhận xét. Vui lòng <a href="#">đăng nhập</a> hoặc <a href="#">đăng ký</a>.</p>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<?php

    }
}
