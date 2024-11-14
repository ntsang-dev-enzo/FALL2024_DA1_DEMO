<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
  public static function render($data = null)
  {


?>

    <section class="banner container mt-4">
      <div class="row">
        <div class="col-12">
          <img src="./img/banner.jpg" alt="Promo Banner" class="img-fluid w-100">
        </div>
      </div>
    </section>

    <div class="container">
      <aside class="sidebar col-3">
        <nav class="navbar category-list col-12 navbar-expand-lg navbar-light">
          <div class="menu col-md-12">
            <h6 style="padding: 10px;background-color: orange;color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
              </svg></i>DANH MỤC</h6>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="index.php?url=dienthoai#dienthoai-content" id="navbarDropdown1" role="button" aria-expanded="false">
                    Sách <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                  <li><a class="dropdown-item" href="#">iPhone</a></li>
                  <li><a class="dropdown-item" href="#">Samsung</a></li>
                  <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                  <li><a class="dropdown-item" href="#">Huawei</a></li>
                  <li><a class="dropdown-item" href="#">Oppo</a></li>
                  <li><a class="dropdown-item" href="#">Vivo</a></li>
                  <li><a class="dropdown-item" href="#">LG</a></li>
                  <li><a class="dropdown-item" href="#">Hornor</a></li>
                  <li><a class="dropdown-item" href="#">Realme</a></li>
                  <li><a class="dropdown-item" href="#">Oneplus</a></li>
                  <li><a class="dropdown-item" href="#">Techno</a></li>
                  <li><a class="dropdown-item" href="#">Nokia</a></li>
                  <li><a class="dropdown-item" href="#">Google Pixel</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button"><a class="dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tạp chí <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                  <li><a class="dropdown-item" href="#">Macbook</a></li>
                  <li><a class="dropdown-item" href="#">Asus</a></li>
                  <li><a class="dropdown-item" href="#">Acer</a></li>
                  <li><a class="dropdown-item" href="#">Dell</a></li>
                  <li><a class="dropdown-item" href="#">Lenovo</a></li>
                  <li><a class="dropdown-item" href="#">HP</a></li>
                  <li><a class="dropdown-item" href="#">MSI</a></li>
                  <li><a class="dropdown-item" href="#">Gygabyte</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bút mực & Bút chì <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown3">
                  <li><a class="dropdown-item" href="#">iPad</a></li>
                  <li><a class="dropdown-item" href="#">Samsung Tab</a></li>
                  <li><a class="dropdown-item" href="#">Redmi Pad</a></li>
                  <li><a class="dropdown-item" href="#">Lenovo</a></li>
                  <li><a class="dropdown-item" href="#">Huawei</a></li>
                  <li><a class="dropdown-item" href="#">Xiaoxin</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Đồng hồ <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown4">
                  <li><a class="dropdown-item" href="#">Apple Watch</a></li>
                  <li><a class="dropdown-item" href="#">Samsung Watch</a></li>
                  <li><a class="dropdown-item" href="#">Huawei Watch</a></li>
                  <li><a class="dropdown-item" href="#">Realme Watch</a></li>
                  <li><a class="dropdown-item" href="#">Redmi Band</a></li>
                  <li><a class="dropdown-item" href="#">Dây đồng hồ</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Đồ chơi <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown5">
                  <li><a class="dropdown-item" href="#">Tivi</a></li>
                  <li><a class="dropdown-item" href="#">Tủ lạnh</a></li>
                  <li><a class="dropdown-item" href="#">Máy lạnh</a></li>
                  <li><a class="dropdown-item" href="#">Máy giặt</a></li>
                  <li><a class="dropdown-item" href="#">Máy rửa chén</a></li>
                  <li><a class="dropdown-item" href="#">Máy quạt</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown6" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gia dụng <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown6">
                  <li><a class="dropdown-item" href="#">Ấm đun siêu tốc</a></li>
                  <li><a class="dropdown-item" href="#">Lò nướng</a></li>
                  <li><a class="dropdown-item" href="#">Máy sấy tóc</a></li>
                  <li><a class="dropdown-item" href="#">Máy lọc nươc</a></li>
                  <li><a class="dropdown-item" href="#">Cân điện tử</a></li>
                  <li><a class="dropdown-item" href="#">Nồi cơm điện</a></li>
                  <li><a class="dropdown-item" href="#">Nồi chiên không dầu</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown7" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Phụ kiện <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown7">
                  <li><a class="dropdown-item" href="#">Tai nghe</a></li>
                  <li><a class="dropdown-item" href="#">Loa</a></li>
                  <li><a class="dropdown-item" href="#">USB - Thẻ nhớ</a></li>/-strong/-heart:>:o:-((:-h <li><a class="dropdown-item" href="#">Chuột</a></li>
                  <li><a class="dropdown-item" href="#">Bàn phím</a></li>
                  <li><a class="dropdown-item" href="#">Ổ cứng</a></li>
                  <li><a class="dropdown-item" href="#">Micro</a></li>
                  <li><a class="dropdown-item" href="#">Giá chụp</a></li>
                  <li><a class="dropdown-item" href="#">Cáp sạc - Củ sạc - Sạc dự phòng</a></li>
                  <li><a class="dropdown-item" href="#">Balo - Túi chống sốc</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown8" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Máy tính <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown8">
                  <li><a class="dropdown-item" href="#">PC văn phòng</a></li>
                  <li><a class="dropdown-item" href="#">PC gaming</a></li>
                  <li><a class="dropdown-item" href="#">iMac</a></li>
                  <li><a class="dropdown-item" href="#">Màn hình</a></li>
                  <li><a class="dropdown-item" href="#">Máy in</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown9" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Camera <i class="fas fa-chevron-right">&nbsp;</i>
                  </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown9">
                  <li><a class="dropdown-item" href="#">Máy ảnh</a></li>
                  <li><a class="dropdown-item" href="#">Máy quay</a></li>
                  <li><a class="dropdown-item" href="#">Lens</a></li>
                </ul>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown10" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Máy cũ giá rẻ
                  </a>
                </button>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button"><a class="dropdown-toggle" href="#" id="navbarDropdown11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Thu cũ đổi mới
                  </a>
                </button>
              </div>
            </div>
            <div class="nav-item dropdown dropend">
              <div class="dropdown-button">
                <button class="dropdown-item-button">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown11" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hàng trưng bày
                  </a>
                </button>
              </div>
            </div>
          </div>
        </nav>
        <div class="fill">
          <h3>NHÓM SẢN PHẨM</h3>
          <ul>
            <li><a href="#">Tất Cả Nhóm Sản Phẩm</a></li>
            <li><a href="#">Văn Phòng Phẩm - Dụng Cụ Học Sinh</a></li>
            <li><a href="#">Lịch Agenda</a></li>
            <li><a href="#">Lịch Bloc</a></li>
            <li><a href="#">Lịch Tờ, Lịch Lò Xo</a></li>
            <li><a href="#">Lịch Khác</a></li>
          </ul>
          <h4>GIÁ</h4>
          <form id="price-filter">
            <label><input type="checkbox" data-min="0" data-max="150000"> 0đ - 150,000đ</label><br>
            <label><input type="checkbox" data-min="150000" data-max="300000"> 150,000đ - 300,000đ</label><br>
            <label><input type="checkbox" data-min="300000" data-max="500000"> 300,000đ - 500,000đ</label><br>
            <label><input type="checkbox" data-min="500000" data-max="700000"> 500,000đ - 700,000đ</label><br>
            <label><input type="checkbox" data-min="700000"> 700,000đ - Trở Lên</label>
          </form>
        </div>
      </aside>
      <main class="main-content">
        <!-- Tìm kiếm form nhỏ nằm ở góc phải -->
        <div class="col-12 d-flex ">
          <div class="sorting col-12">
            <label for="sort" class="col-2">Sắp xếp theo:</label>
            <select id="sort" class="form-select me-3">
              <option value="default">Bán Chạy Tuần</option>
              <option value="lowToHigh">Giá: Thấp đến Cao</option>
              <option value="highToLow">Giá: Cao đến Thấp</option>
            </select>
            <select class="form-select">
              <option>24 sản phẩm</option>
            </select>

            <form class="d-flex col-5 ms-4">
              <input class="form-control me-2" type="search" placeholder="Search for books" aria-label="Search">
              <button class="btn btn-success" type="button">Search</button>
            </form>
          </div>
        </div>


        <div class="product-grid" id="product-grid">

          <?php
          if (count($data) && count($data['products'])):
            foreach ($data['products'] as $item):
          ?>
              <div class="product" data-price="70520">
                <div class="discount">18%</div>
                <img src="public/assets/client/images/<?= $item['image'] ?>" alt="Product 2">
                <h5><?= $item['name'] ?></h5>
                <p class="price"><span class="old-price"><?= $item['discount_price'] ?> đ</span><?= $item['price'] ?> đ</p>
              </div>

          <?php
            endforeach;
          endif;
          ?>
        </div>
      </main>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<?php


  }
}
