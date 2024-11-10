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
                     <a class="logof" href="index.html"><img src="/public/assets/client/images/logofooter.png" alt="#"/></a> 
                     <form class="form_subscri">
                        <div class="row">
                           <div class="col-md-12">
                              <h3>Subscribe Now</h3>
                           </div>
                           <div class="col-md-12">
                              <input class="subsrib" placeholder="Enter your email" type="text" name="Enter your email">
                           </div>
                           <div class="col-md-12">
                              <button class="subsci_btn">subscribe</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Information</h3>
                        <ul>
                           <li>There are many </li>
                           <li>variations of pas</li>
                           <li>sages of Lorem  </li>
                           <li>psum available,  </li>
                           <li>but the majority  </li>
                           <li>have suffered  </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Helpful Links</h3>
                        <ul>
                           <li>There are many </li>
                           <li>variations of pas</li>
                           <li>sages of Lorem  </li>
                           <li>psum available,  </li>
                           <li>but the majority  </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Our Weddings</h3>
                        <ul>
                           <li>There are many </li>
                           <li>variations of pas</li>
                           <li>sages of Lorem  </li>
                           <li>psum available,  </li>
                           <li>but the majority  </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                        <h3>Contact Us</h3>
                        <ul class="conta">
                           <li><i class="fa fa-map-marker" aria-hidden="true"></i>Locations 
                           </li>
                           <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>+71 12345678901</li>
                           <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> demo@gmail.com</a></li>
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
                        <p>© 2020 All Rights Reserved. <a href=""> Free html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <script src="<?= APP_URL?>/public/assets/client/script.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="<?= APP_URL?>/public/assets/client/js/plugins.js"></script>

      </body>
   
</html>
<?php

        // unset($_SESSION['success']);
        // unset($_SESSION['error']);
    }
}

?>