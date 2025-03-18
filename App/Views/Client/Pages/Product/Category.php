<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category as Categories;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <?php
        Categories::render($data);
        ?>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-between">
                <!-- Bộ lọc bên trái -->
                <div class="col-md-3 pe-3 filter-section">
                    <div class="search-product-form d-flex">
                        <form action="/client/products/search" method="GET" class="d-flex col-4" id="searchForm">
                            <input type="hidden" name="method" value="GET">
                            <input style="width:180px" name="keyword" id="searchQuery" class="form-control me-2" type="search" placeholder="Tìm kiếm bánh..." aria-label="Search">
                            <button style="font-size:10px" class="btn btn-success" type="submit">Tìm kiếm</button>
                            <button type="button" id="voiceSearch" class="btn btn-secondary">🎤</button>
                        </form>
                    </div>
                    <script>
                        document.getElementById('voiceSearch').addEventListener('click', function() {
                            if (!("webkitSpeechRecognition" in window)) {
                                alert("Trình duyệt của bạn không hỗ trợ tìm kiếm bằng giọng nói.");
                                return;
                            }
                            const recognition = new webkitSpeechRecognition();
                            recognition.lang = "vi-VN";
                            recognition.onresult = function(event) {
                                const transcript = event.results[0][0].transcript;
                                document.getElementById("searchQuery").value = transcript;
                                document.getElementById("searchForm").submit();
                            };
                            recognition.start();
                        });
                    </script>

                    <!-- Danh mục sản phẩm -->
                    <div class="mb-4">
                        <h5 class="mb-3 text-primary">Danh mục sản phẩm</h5>
                        <ul class="list-unstyled">
                        <li><a href="/products" class="text-decoration-none text-dark">Tất cả sản phẩm</a></li>
                            <?php if (count($data) && count($data['categories'])): ?>
                                <?php foreach ($data['categories'] as $item): ?>
                                    <li><a href="/products/categories/<?= $item['id'] ?>" class="text-decoration-none text-dark"><?= $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Giá sản phẩm -->
                    <div class="mb-4">
                        <h5 class="mb-3 text-primary">Giá sản phẩm</h5>
                        <label for="priceRange" class="form-label">30.000 - 600.000</label>
                        <input type="range" class="form-range" id="priceRange">
                    </div>

                    <!-- Kích thước sản phẩm -->
                    <div class="mb-4">
                        <h5 class="mb-3 text-primary">Kích thước</h5>
                        <div class="filter-size">
                            <span class="badge bg-secondary me-2">20cm</span>
                            <span class="badge bg-secondary me-2">28cm</span>
                            <span class="badge bg-secondary me-2">16x16cm</span>
                        </div>
                    </div>
                </div>

                <!-- Danh sách sản phẩm bên phải -->
                <div class="col-md-9">
                    <h4 class="text-primary mb-3">Tất cả sản phẩm</h4>

                    <div class="row" id="product-grid">
                        <?php if (count($data) && count($data['products'])): ?>
                            <?php foreach ($data['products'] as $item): ?>
                                <div class="col-lg-3 product_card col-md-6 mb-4">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="position-relative overflow-hidden">
                                            <div class="discount position-absolute top-0 start-0 bg-danger text-white rounded px-2 py-1">
                                                -<?= round((($item['to_price'] - $item['price']) / $item['to_price'] * 100)) ?>%
                                            </div>
                                            <a href="/products/<?= $item['id'] ?>">
                                                <img style="height: 300px;" src="/public/uploads/products/<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['name'] ?? '' ?>">
                                            </a>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                <a class="text-decoration-none text-dark" href="/products/<?= $item['id'] ?>">
                                                    <?= $item['name'] ?? '' ?>
                                                </a>
                                            </h5>
                                            <p class="card-text mb-2">
                                                <span class="text-muted text-decoration-line-through">
                                                <?= number_format($item['to_price']) ?>đ
                                                </span><br>
                                                <span class="text-danger fw-bold">
                                                <?= number_format($item['price']) ?>đ
                                            </p>
                                            <div class="mt-auto">
                                                <a href="/products/<?= $item['id'] ?>" class="btn btn-primary w-100">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Phân trang -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-4">
                            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

<?php
    }
}
?>