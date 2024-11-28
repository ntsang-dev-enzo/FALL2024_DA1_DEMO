<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
   public static function render($data = null)
   {
?>

      <footer>
         <div class="footer col-12">
            <div class="container col-12">
               <div class="row border_bo1 col-12">
                  <div class="col-md-4">
                     <a class="logof" href="index.html"><img src="/public/assets/client/images/logofooter.png" alt="#" /></a>
                     <form class="form_subscri">
                        <div class="row">
                           <div class="col-md-12">
                              <h3>Đăng ký ngay</h3>
                           </div>
                           <div class="col-md-12">
                              <input class="subsrib" placeholder="Nhập email của bạn" type="text" name="Enter your email">
                           </div>
                           <div class="col-md-12">
                              <button class="subsci_btn">Đăng ký</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Thông tin</h3>
                        <ul>
                           <li>Sách Thiếu Nhi </li>
                           <li>Truyện tranh</li>
                           <li>Truyện Đam mỹ</li>
                           <li>Sách nhăn văn</li>
                           <li>Sách báo chí</li>
                           <li>Sách vui</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Liên kết</h3>
                        <ul>
                           <li>Toàn quốc</li>
                           <li>Có ở mọi nơi</li>
                           <li>Cửa hàng sách</li>


                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Thể loại</h3>
                        <ul>
                           <li>Đam mỹ</li>
                           <li>Hiện đại</li>
                           <li>Cổ trang</li>
                           <li>Kỳ tích</li>
                           <li>Xuyên không</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Liên hệ</h3>
                        <ul class="conta">
                           <li><i class="fa fa-map-marker" aria-hidden="true"></i>Địa điểm
                           </li>
                           <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>+84 0587961173 </li>
                           <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> thuongdtdpc05718@fpt.edu.vn</a></li>
                        </ul>
                        <ul class="social_icon">
                           <li><a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                           <li><a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright col-12">
               <div class="container col-12">
                  <div class="row col-12">
                     <div class="col-md-12">
                        <p>© 2024 Mọi quyền được bảo hành. <a href=""> Cửa hàng sách của chúng tôi luôn chào đón bạn</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
      <script src="/public/assets/client/app.js"></script>
      <script src="/public/assets/client/script.js"></script>
      <script src="/public/assets/client/js/plugins.js"></script>
      </body>

      </html>
<?php

      // unset($_SESSION['success']);
      // unset($_SESSION['error']);
   }
}

?>