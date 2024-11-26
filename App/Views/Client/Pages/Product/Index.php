<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
  public static function render($data = null)
  {


?>
    <div class="col-10 mx-auto">
      <section class="banner container mt-4 mb-4">
        <div class="col-12">
          <div class="row">
            <img src="./img/banner.jpg" alt="Promo Banner" class=" text-start w-100">
          </div>
        </div>
      </section>

      <div class="container">
        <div class="d-flex justify-content-between mb-5">
          <aside class="sidebar col-3">
            <nav class="navbar category-list col-12 navbar-expand-lg navbar-light">
              <div class="menu col-md-12">
                <h6 style="padding: 10px;background-color: orange;color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                  </svg></i>DANH MỤC</h6>
                <?php
                if (count($data) && count($data['categories'])):
                  foreach ($data['categories'] as $item):
                ?>
                    <div class="nav-item dropdown dropend">
                      <div class="dropdown-button">
                        <button class="dropdown-item-button">
                          <a class="dropdown-toggle" href="/products" id="navbarDropdown1" role="button" aria-expanded="false">
                            <?= $item['name'] ?> <i class="fas fa-chevron-right">&nbsp;</i>
                          </a>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                          <li><a class="dropdown-item" href="#">iPhone</a></li>
                          <li><a class="dropdown-item" href="#">Samsung</a></li>
                          <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                        </ul>
                      </div>
                    </div>
                <?php
                  endforeach;
                endif;
                ?>
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
                    <a href="/products/<?= $item['id'] ?>">
                      <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?? '' ?>"></a>
                    <h5 class="text-start mt-2"><a class="text-decoration-none" href="/products/<?= $item['id'] ?>"><?= $item['name'] ?? '' ?></a></h5>
                    <div class="price text-start"><span class="old-price"><?= $item['discount_price'] ?> đ<br></span><?= $item['price'] ?> đ</div>
                    <div class=" mt-3 progress-container-cart">
                      <div class="progress-bar-cart">
                        Đã bán 165
                      </div>
                    </div>
                    <div class="mt-2">
                      <button class="btn btn-cart btn-outline-danger w-100">Thêm vào giỏ hàng</button>
                    </div>
                    <div class="mt-1">
                      <a href="/products/<?= $item['id'] ?>" class="btn btn-cart btn-danger w-100">Xem thêm</a>
                    </div>
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



<?php


  }
}
