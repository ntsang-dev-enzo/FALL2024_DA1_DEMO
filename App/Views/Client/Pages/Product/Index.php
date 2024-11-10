<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>


        
<nav class="serch ">
        <a class="navbar-brand" href="#"></a>
        <div class="roww">
            <form class="TimKiem">
                <input class="form-control" type="search" placeholder="Search for books" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

  
    <section class="banner container mt-4">
        <div class="row">
            <div class="col-12">
                <img src="./img/banner.jpg" alt="Promo Banner" class="img-fluid w-100">
            </div>
        </div>
    </section>
  <div class="container">
    <aside class="sidebar">
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
    </aside>
    <main class="main-content">
      <div class="sorting">
        <label for="sort">Sắp xếp theo:</label>
        <select id="sort">
          <option value="default">Bán Chạy Tuần</option>
          <option value="lowToHigh">Giá: Thấp đến Cao</option>
          <option value="highToLow">Giá: Cao đến Thấp</option>
        </select>
        <select>
          <option>24 sản phẩm</option>
        </select>
      </div>

      <div class="product-grid" id="product-grid">
        <div class="product" data-price="45240">
          <div class="discount">13%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/l/i/lich-tuong-2025_1.jpg" alt="Product 1">
          <h5>Lịch Bàn Chữ A 2025 - Danh Cảnh Việt Nam</h5>
          <p class="price"><span class="old-price">52.000 đ</span> 45.240 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">10%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8936214273591.jpg" alt="Product 2">
          <h5>Mini Fashion - Mèo Catty</h5>
          <p class="price"><span class="old-price">28.800 đ</span>32.000đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">23%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-lich-su-viet-nam_dinh-bo-linh_tb-2023.jpg" alt="Product 2">
          <h5>Tranh Truyện Lịch Sử Việt Nam - Đinh Bộ Lĩnh (Tái Bản 2023)</h5>
          <p class="price"><span class="old-price">15.400 đ</span></span> 20.000 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">23%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-dgvn_su-tich-chu-cuoi-cung-trang_tb-2023.jpg" alt="Product 2">
          <h5>Tranh Truyện Dân Gian Việt Nam - Sự Tích Chú Cuội Cung Trăng (Tái Bản 2023)</h5>
          <p class="price"><span class="old-price">15.000 đ</span> 20.520 đ</p>
        </div>
        <div class="product" data-price="70520">/-strong/-heart:>:o:-((:-h <div class="discount">23%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-lich-su-viet-nam_phung-hung_tb-2023.jpg" alt="Product 2">
          <h5>Tranh Truyện Lịch Sử Việt Nam - Phùng Hưng (Tái Bản 2023)</h5>
          <p class="price"><span class="old-price">15.000 đ</span> 20.000đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">13%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-lich-su-viet-nam_duy-tan_tb-2023.jpg" alt="Product 2">
          <h5>Tranh Truyện Lịch Sử Việt Nam - Duy Tân (Tái Bản 2023)
          </h5>
          <p class="price"><span class="old-price">17.000 đ</span> 20.000 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">23%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-lich-su-viet-nam_thien-su-van-hanh.jpg" alt="Product 2">
          <h5>Tranh Truyện Lịch Sử Việt Nam - Thiền Sư Vạn Hạnh
          </h5>
          <p class="price"><span class="old-price">15.000 đ</span> 20.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-lich-su-viet-nam_tran-khanh-du_tb-2023.jpg" alt="Product 2">
          <h5>Tranh Truyện Lịch Sử Việt Nam - Trần Khánh Dư (Tái Bản 2023)
          </h5>
          <p class="price"><span class="old-price">15.000 đ</span> 20.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8935244873955_1.jpg" alt="Product 2">
          <h5>Cây Bách Xù - Truyện Cổ Grimm Kinh Dị Được Kể Bằng Tranh
          </h5>
          <p class="price"><span class="old-price">112.230 đ</span>129.000 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/8/9/8935244823387.jpg" alt="Product 2">
          <h5>Lược Sử Nước Việt Bằng Tranh - Viet Nam - A Brief History In Pictures - Bìa Cứng (Tái Bản 2019)
          </h5>
          <p class="price"><span class="old-price">160.720 đ

</span> 196.000</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">13%%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/a/tam-tinh-be-nho_dong-song-cua-leonie_bia.jpg" alt="Product 2">
          <h5>Tâm Tình Bé Nhỏ - Dòng Sông Của Léonie</h5>
          <p class="price"><span class="old-price">69.000 đ</span> 70.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>/-strong/-heart:>:o:-((:-h <img src="https://cdn0.fahasa.com/media/catalog/product/c/o/comic-ki-nang-song_giao-thong-an-toan_bia.jpg" alt="Product 2">
          <h5>Comic Kĩ Năng Sống - Dành Cho Trẻ Tiểu Học - Giao Thông An Toàn</h5>
          <p class="price"><span class="old-price">40.000 đ</span> 45.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/c/o/comic-ki-nang-song_an-uong-an-toan_bia.jpg" alt="Product 2">
          <h5>Comic Kĩ Năng Sống - Dành Cho Trẻ Tiểu Học - Ăn Uống An Toàn
          </h5>
          <p class="price"><span class="old-price">40.000 đ</span> 45.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/y/ty-quay_bia_tap-14.jpg" alt="Product 2">
          <h5>Tý Quậy - Tập 14
          </h5>
          <p class="price"><span class="old-price">34.000 đ</span> 40.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-dan-gian-viet-nam_sinh-con-roi-moi-sinh-cha_tb-2024.jpg" alt="Product 2">
          <h5>Tranh Truyện Dân Gian Việt Nam - Sinh Con Rồi Mới Sinh Cha (Tái Bản 2024)
          </h5>
          <p class="price"><span class="old-price">17.000 đ</span> 20.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/c/o/combo-8935244874389-8935212351621.jpg" alt="Product 2">
          <h5>Combo Sách Lược Sử Nước Việt Bằng Tranh + 100 Kỹ Năng Sinh Tồn (Bộ 2 Cuốn)
          </h5>
          <p class="price"><span class="old-price">185.269 đ

</span> 239.000 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/7/-/7-ki-nang-guong-mau-sieu-quay_bia.jpg" alt="Product 2">
          <h5>  7 Kĩ Năng Gương Mẫu Siêu Quậy
          </h5>
          <p class="price"><span class="old-price">39.000 đ</span> 45.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/h/a/hanh-trang-the-he-alpha_hop-tac-khong-kho.jpg" alt="Product 2">
          <h5>Hành Trang Thế Hệ Alpha - Hợp Tác Không Khó
          </h5>
          <p class="price"><span class="old-price">30.000 đ</span> 35.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>/-strong/-heart:>:o:-((:-h <img src="https://cdn0.fahasa.com/media/catalog/product/n/h/nhat-ki-phieu-luu_50-thu-thach-cho-ki-nghi-sieu-li-thu_bia.jpg" alt="Product 2">
          <h5>Nhật Kí Phiêu Lưu - 50 Thử Thách Cho Kì Nghỉ Siêu Lí Thú
          </h5>
          <p class="price"><span class="old-price">47.000 đ</span> 55.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/t/ttgt2.jpg" alt="Product 2">
          <h5>Tôn Trọng Giới Tính - Cổ Tích Bình Đẳng Giới - Tóc Mây Thông Minh - Người Đẹp Tóc Mây Tìm Lại Tự Do
          </h5>
          <p class="price"><span class="old-price">30.000 đ</span> 35.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/r/tranh-truyen-dan-gian-viet-nam_su-tich-hat-thoc_tb-2024.jpg" alt="Product 2">
          <h5>Tranh Truyện Dân Gian Việt Nam - Sự Tích Hạt Thóc (Tái Bản 2024)
          </h5>
          <p class="price"><span class="old-price">15.000 đ</span> 20.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/a/tam-biet-thoi-quen-xau_luoi-van-dong.jpg" alt="Product 2">
          <h5>Tạm Biệt Thói Quen Xấu - Lười Vận Động
          </h5>
          <p class="price"><span class="old-price">26.000 đ</span> 30.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/a/tam-biet-thoi-quen-xau_ngoay-tai-nhieu.jpg" alt="Product 2">
          <h5>Tạm Biệt Thói Quen Xấu - Ngoáy Tai Quá Nhiều

          </h5>
          <p class="price"><span class="old-price">26.000 đ</span> 30.520 đ</p>
        </div>
        <div class="product" data-price="70520">
          <div class="discount">18%</div>
          <img src="https://cdn0.fahasa.com/media/catalog/product/t/a/tam-biet-thoi-quen-xau_nghien-thiet-bi-dien-tu.jpg" alt="Product 2">
          <h5>Tạm Biệt Thói Quen Xấu - Nghiện Thiết Bị Điện Tử</h5>
          <p class="price"><span class="old-price">26.000 đ</span> 30.520 đ</p>
        </div>
      </div>
    </main>
  </div>



<?php

    }
}
