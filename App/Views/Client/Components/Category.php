<?php

namespace App\Views\Client\Components;

use App\Models\MiniCategory;
use App\Views\Client\Components\Mini_Category;
use App\Views\BaseView;
class Category extends BaseView
{
    public static function render($data = null)
    {
?>

          
                        <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                                <div class="text-center p-4">
                                    <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                        // THANH XUÂN CAKE
                                    </div><a href="/products/categories/1">
                                    <h3 class="mb-3">Bánh kem</h3></a>
                                    <span></span>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="category_product_img" src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/472361361_579635671519584_1661264150138148614_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=f727a1&_nc_ohc=7T5aKRoFgKEQ7kNvgEZn4Df&_nc_oc=AdiDHb-WdiLd9IX6-8IN4QB-ypeSvvgcczwbD2YAjgD6ZI9FoiFEkNycJf5cV5YW3fA&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AxTyjLQENfghL-4Wx-O4-MG&oh=00_AYC1ak3fSAoChVW6gh0kIBwNqcH3ve9K4-BE8wpMYKYizQ&oe=678A8802" alt="">
                                    <div class="product-overlay">
                                        <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/1"><i class="fa fa-eye text-primary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                                <div class="text-center p-4">
                                    <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                        // THANH XUÂN CAKE
                                    </div><a href="/products/categories/3">
                                    <h3 class="mb-3">Bánh bông lan</h3></a>
                                    <span></span>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="category_product_img" src="https://scontent.fvca1-4.fna.fbcdn.net/v/t39.30808-6/471328869_579635728186245_4492530848632245412_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=f727a1&_nc_ohc=FZy25NOLJlsQ7kNvgFmkydP&_nc_oc=Adi1isvlDIeKH6EgmQZMKbxuphL8xN52iJhplrbQA2xdHKdQHie7wzdCUHto6Z36UdI&_nc_zt=23&_nc_ht=scontent.fvca1-4.fna&_nc_gid=AaNGHhwv-Pj_aRimqC-EItb&oh=00_AYDZV0Ilp19P-n0aoBK3m_EySDdB48jItEEULd1k3RbCEQ&oe=678A6691" alt="">
                                    <div class="product-overlay">
                                        <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/3"><i class="fa fa-eye text-primary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-2 category_product col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                                <div class="text-center p-4">
                                    <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">
                                        // THANH XUÂN CAKE
                                    </div><a href="/products/categories/4">
                                    <h3 class="mb-3">Các loại khác</h3></a>
                                    <span></span>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="category_product_img" src="https://scontent.fvca1-2.fna.fbcdn.net/v/t39.30808-6/472054684_3967048130280466_511408988741176069_n.jpg?stp=dst-jpg_p526x296_tt6&_nc_cat=107&ccb=1-7&_nc_sid=f727a1&_nc_ohc=vA76eVv0w1oQ7kNvgEc4row&_nc_oc=AdgB55jzU3-yYSvYX8S2bK76nCneOAIgJrYwQuibN-wTOd4GQUKc5n7gipdsZvsevqE&_nc_zt=23&_nc_ht=scontent.fvca1-2.fna&_nc_gid=AOd2xqxAkQyb9OUUq7HDiyy&oh=00_AYCyq9w19rqsTx7zHxQZ7eRJkle3UIZuFzIfSPR3oQQs5w&oe=678A93AA" alt="">
                                    <div class="product-overlay">
                                        <a class="btn btn-lg-square btn-outline-light rounded-circle" href="/products/categories/4"><i class="fa fa-eye text-primary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    

<?php


    }
}
