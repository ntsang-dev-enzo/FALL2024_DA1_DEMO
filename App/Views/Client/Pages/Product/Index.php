<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {

?>

        <!-- Page Header Start -->
        <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center pt-5 pb-3">
                <h1 class="display-4 text-white animated slideInDown mb-3">Các loại bánh</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Category Start -->
        <div class="container-xxxl bg-light my-6 col-12 py-6 pt-0">
            <div class="col-11 mx-auto">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="text-primary text-uppercase pt-2 mb-2">// Thanh Xuan CAKE</p>
                    <h1 class="display-6 ">Bạn muốn mua gì?</h1>
                </div>
                                <!-- Price Filter -->
                                
                <!-- End Price Filter -->
                <div class="row g-4">
                    <?php 
                    
                    Category::render($data)
                    ?>
                </div>
                


            </div>
        </div>
        </div>
        <!-- Category End -->

<?php
    }
}
