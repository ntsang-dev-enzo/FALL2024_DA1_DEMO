<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Myaccount extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!-- link css -->
            <link rel="stylesheet" href="/public/assets/client/css/myaccount.css">

            <!-- link icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thông tin cá nhân</title>
        </head>

        <body>

        <form action="/loginform" method="post" enctype="multipart/form-data" id="form_input">
            <div class="container">
                
                    <div class="box">
                        <div class="form sign_in">
                            <h3>Thông tin cá nhân</h3>
                            <span>Thanh Xuân CAKE</span>
                            <div class="type">
                                <input type="text" placeholder="Họ và tên" name="name" id="name">
                            </div>
                            <div class="type">
                                <input type="hidden" name="method" value="POST" id="">
                                <input type="email" placeholder="Email" name="email" id="email">
                            </div>
                            <div class="type">
                                <input type="tel" placeholder="Số điện thoại" name="phone" id="phone">
                            </div>
                            <div class="type">
                                <input type="text" placeholder="Địa chỉ" name="address" id="address">
                            </div>
                            <button class="btn bkg">Cập nhật thông tin</button>
                            <br>
                            <a href="/" class="btn bkg close" style="background-color:lightgray">Đóng</a>

                        </div>

                    </div>
                    <div class="overlay">
                        <div class="page">
                            <h3>Ảnh đại diện</h3>
                            <p>
                                <img src="https://scontent.fvca1-1.fna.fbcdn.net/v/t39.30808-1/472860462_2328737810846430_3717461997649856781_n.jpg?stp=cp0_dst-jpg_s32x32_tt6&_nc_cat=105&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeGMySdfYUgMmH4e1pLK35MiFHg47vGSW1kUeDju8ZJbWU6ZWeMBrAaMGrmTuidXmTzxg4FetHfGthkXSfdKmZkv&_nc_ohc=XE9NVH50xN0Q7kNvgH12yyP&_nc_oc=AdhXya5XgYvbTuMfG0OeWOnphV6lGiquX_a7CvQldehHNHy45sL0ZVibgYgIGTK6RTeDKkX18FgihzAPJVZigreO&_nc_zt=24&_nc_ht=scontent.fvca1-1.fna&_nc_gid=AGmQ_N1JSS8VHJ8MOyyeh4f&oh=00_AYDuVcB8-tHkXAPsKwNXqx_GI_kl-3SVLRRcigqfipvLAQ&oe=679AD634" alt="" class="rounded-circle" style="width: 150px; height: 150px;">
                            </p>
                            <div class="file-input-container">
                                <input type="file" name="image" id="image" class="file-input" />
                                <label for="image" class="file-input-label">
                                    Chọn tệp
                                </label>
                                <span class="file-name">Chưa có tệp được chọn</span>
                            </div>
                        </div>
                    </div>
                
            </div>
</form>
            <script src="/public/assets/client/app.js"></script>
        </body>

        </html>
<?php

    }
}
