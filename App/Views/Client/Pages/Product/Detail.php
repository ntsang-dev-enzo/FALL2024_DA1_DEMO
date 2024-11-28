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
        <div class="container">
            <div class="container col-12 my-5">
                <ol class="breadcrumb">
                    <li class="0">
                        <a href="https://www.fahasa.com/sach-trong-nuoc.html" title="Sách tiếng Việt">Sách tiếng Việt</a>
                        <span>/ </span>
                    </li>
                    <li class="1">
                        <a href="https://www.fahasa.com/sach-trong-nuoc/manga-comic.html" title="Manga - Comic">Manga - Comic</a>
                        <span>/ </span>
                    </li>
                    <li class="2">
                        <a href="https://www.fahasa.com/sach-trong-nuoc/manga-comic/manga.html" title="Manga">Manga</a>
                        <span>/ </span>
                    </li>
                    <li class="3">
                        <a href="https://www.fahasa.com/sach-trong-nuoc/manga-comic/manga/manga-khac.html" title="Manga Khác">Manga Khác</a>
                    </li>
                </ol>
                <div class="row bg-light d-flex p-2 justify-content-between">

                    <div class="col-md-5 bg-white rounded-3 p-2">
                        <div class="card">
                            <img src="/public/uploads/products/<?= $data['product']['image'] ?>" class="card-img-top" alt="Product Image">
                        </div>
                        <div class="mt-3 d-flex">
                            <button class="btn btn-outline-danger btn-lg w-100 mb-3">Thêm vào giỏ hàng</button>
                            <button class="btn btn-danger btn-lg mb-3 ms-1 w-100">Mua ngay</button>
                        </div>

                        <h5>Chính sách ưu đãi của Fahasa</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-truck me-2"></i> Giao hàng nhanh và uy tín</li>
                            <li><i class="bi bi-arrow-repeat me-2"></i> Đổi trả miễn phí toàn quốc</li>
                            <li><i class="bi bi-shield-check me-2"></i> Ưu đãi khi mua số lượng lớn</li>
                        </ul>

                    </div>

                    <div class="col-md-7  ">
                        <div class="bg-white rounded-3 p-2">
                            <h2 class="fw-bold"><?= $data['product']['name'] ?></h2>
                            <p class="text-muted">Tác giả: <?= $data['product']['author'] ?></p>
                            <p class="text-muted">Hình thức bìa: <?= $data['product']['cover'] ?></p>
                            <p class="text-muted">Lượt xem: <?= $data['product']['view'] ?></p>
                            <h3 class="text-danger"><?= number_format($data['product']['price']) ?> <span class="text-muted text-decoration-line-through"><?= number_format($data['product']['discount_price']) ?></span> <span class="badge bg-warning text-dark">-28%</span></h3>

                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <span class="me-2">Flash Sale</span>
                                <div><span id="countdown">01:47:41</span></div>
                            </div>

                            <div class="mt-4 bg-white rounded-3  p-2">
                                <h5>Thông tin vận chuyển</h5>
                                <p>Giao hàng đến <strong>Phường Bến Nghé, Quận 1, Hồ Chí Minh</strong> - <a href="#">Thay đổi</a></p>
                                <p>Giao hàng tiêu chuẩn - Dự kiến giao Thứ hai - 11/11</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5>Ưu đãi liên quan</h5>
                            <button class="btn btn-outline-primary btn-sm me-2">Mã giảm 10k</button>
                            <button class="btn btn-outline-primary btn-sm me-2">Mã giảm 25k</button>
                            <button class="btn btn-outline-primary btn-sm">ShopeePay: giảm 5k</button>
                        </div>
                        <div class="mt-5 bg-white rounded-3 p-2">
                            <h4>Thông tin chi tiết</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Mã hàng</th>
                                        <td><?= $data['product']['id'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tên Nhà Cung Cấp</th>
                                        <td><?= $data['product']['supplier'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tác giả</th>
                                        <td><?= $data['product']['author'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NXB</th>
                                        <td><?= $data['product']['publisher'] ?></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div class=" mt-2 bg-white rounded-3 p-2">
                        <h3>Thông tin sản phẩm: <br></h3><?= $data['product']['description'] ?>
                    </div>
                </div>

            </div>


            <!-- Related Products Section -->

            <div class="container col-10 my-5">
                <h4 class="fw-bold">Sách liên quan </h4>
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
                                    <li>5 sao <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 0%;"></div>
                                        </div> 0%</li>
                                    <li>4 sao <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 0%;"></div>
                                        </div> 0%</li>
                                    <li>3 sao <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 0%;"></div>
                                        </div> 0%</li>
                                    <li>2 sao <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 0%;"></div>
                                        </div> 0%</li>
                                    <li>1 sao <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 0%;"></div>
                                        </div> 0%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-100 mb-100">
                    <div class="col-lg-12">
                        <div class="bg-light">
                            <div class="card-body text-center">
                                <h4 class="card-title">Bình luận mới nhất</h4>
                            </div>
                            <div class="comment-widgets">
                                <?php
                                if (isset($data) && isset($data['comments']) && $data && $data['comments']):
                                    foreach ($data['comments'] as $item):
                                ?>
                                        <!-- Comment Row -->
                                        <div class="d-flex flex-row comment-row m-t-0">
                                            <div class="p-2">
                                                <?php
                                                if ($item['image']):
                                                ?>
                                                    <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['image'] ?>" alt="user" height="81" width="81" class="rounded-circle">
                                                <?php
                                                else:
                                                ?>
                                                    <img src="https://via.placeholder.com/150" alt="user" height="81" width="81" class="rounded-circle">
                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                            <div class="comment-text w-100">
                                                <h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?></h6>
                                                <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                                <div class="comment-footer">
                                                    <span class="text-muted float-right"><?= $item['date'] ?></span>

                                                    <?php if (isset($data) && $is_login && ($_SESSION['user']['id'] == $item['user_id'])): ?>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="comment">Sửa</button>
                                                        <form action="/comments/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Bạn có chắc chắn xóa bình luận này?')" style="display: inline-block">
                                                            <input type="hidden" name="method" value="DELETE" id="">
                                                            <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                            <button type="submit" class="btn btn-danger btn-sm">Xoá</button>

                                                        </form><?php endif; ?>
                                                    <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">


                                                        <div class="card-body mt-5">
                                                            <form action="/comments/<?= $item['id'] ?>" method="post">
                                                                <input type="hidden" name="method" value="PUT" id="">
                                                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="">
                                                                <div class="form-group">
                                                                    <label for="">Bình luận</label>
                                                                    <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" style="width:150px;" class="btn btn-primary btn-sm">Gửi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <?php
                                    endforeach;
                                else:
                                    ?>
                                    <h6 class="text-center text-danger">Chưa có bình luận nào</h6>
                                <?php
                                endif;
                                ?>
                                <?php if (isset($data) && $is_login): ?>
                                    <div class="d-flex flex-row comment-row">

                                        <div class="p-2">

                                            <?php
                                            if ($_SESSION['user']['image']):
                                            ?>
                                                <img src="<?= APP_URL ?>/public/uploads/users/<?= $_SESSION['user']['image'] ?>" alt="user" height="81" width="81" class="rounded-circle">
                                            <?php
                                            else:
                                            ?>
                                                <img src="https://via.placeholder.com/150" alt="user" height="81" width="81" class="rounded-circle">
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><?= $_SESSION['user']['name'] ?> - <?= $_SESSION['user']['username'] ?></h6>
                                            <form action="/comments" method="post">
                                                <input type="hidden" name="method" value="POST" id="">
                                                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>" id="user_id">
                                                <input type="hidden" name="product_id" value="<?= $data['product']['id'] ?>" id="product_id">
                                                <div class="form-group">
                                                    <label for="">Bình luận</label>
                                                    <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."></textarea>
                                                </div>
                                                <div class="comment-footer">
                                                    <p></p>
                                                    <button type="submit" style="width: 150px;" class="btn btn-primary btn-sm">Gửi</button>
                                                    <p></p>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                <?php else: ?>
                                    <h6 class="text-center text-danger">Vui lòng <a href="/login">đăng nhập</a> để bình luận!</h6>
                                <?php endif; ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<?php

    }
}
